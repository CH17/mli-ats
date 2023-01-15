<?php

namespace App\Http\Controllers;

use App\User;
use App\Setting;
use App\MocBoard;
use Notification;
use App\CreditType;
use App\MocPractice;

use App\ProjectMeta;
use App\AudienceType;
use App\JointProvider;
use App\MocCreditType;
use App\MocBoardProject;
use App\JpContactProject;
use App\CreditTypeProject;
use App\Jp2ContactProject;
use App\Jp3ContactProject;
use App\MocPracticeProject;
use App\AudienceTypeProject;
use Illuminate\Http\Request;
use App\MocCreditTypeProject;
use App\CreditTypeNonMliProject;
use App\Formatter\ProjectFormatter;
use App\Validator\ProjectValidator;
use App\Notifications\ProjectMessage;
use App\NextBusinessDate\GetNextBusinessDate;

class FormController extends Controller
{


    public function index()
    {

        $joint_providers = JointProvider::all();

        $data['joint_providers'] = $joint_providers;

        $audience_types = AudienceType::all();

        $data['audience_types'] = $audience_types;

        $credit_types = CreditType::orderBy('order', 'asc')->get();

        $data['credit_types'] = $credit_types;

        $moc_boards = MocBoard::all();

        $data['moc_boards'] = $moc_boards;

        $moc_credit_types = MocCreditType::all();

        $data['moc_credit_types'] = $moc_credit_types;

        $moc_practices = MocPractice::all();

        $data['moc_practices'] = $moc_practices;

        $criteria_list = config('constants.criteria');

        $data['criteria_list'] = $criteria_list;

        return view('frontend.index', $data);
    }



    public function validateStep1(Request $request)
    {


        $validation = new ProjectValidator();
        $validator = $validation->step1validation($request);



        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        return response()->json(['success' => true]);
    }



    public function store(Request $request)
    {

        $validation = new ProjectValidator();
        $validator = $validation->step3validation($request);


        if ($validator->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $project_data = new ProjectFormatter();
        $data = $project_data->format($request);

        $setting = new Setting();
        $due_days = !empty($setting->getSetting('due_days')) ? $setting->getSetting('due_days') : 3;

        $get_next_business_date = new GetNextBusinessDate();
        $next_business_date = $get_next_business_date->addBusinessDays(strtotime($request->start_date), $due_days);

        $data['project_info']['due_date'] = $next_business_date;

        $project = \App\Project::create($data['project_info']);

        $project_meta = $project->meta ?: new ProjectMeta();
        foreach ($data['project_meta'] as $key => $data) {
            $project_meta->$key = $data;
        }

        $project->meta()->save($project_meta);


        if (!empty($request->jp_contact_id)) {
            foreach ($request->jp_contact_id as $jp_contact_id) {
                $jp_contact_project = new JpContactProject();
                $jp_contact_project->project_id = $project->id;
                $jp_contact_project->jp_contact_id = $jp_contact_id;
                $jp_contact_project->save();
            }
        }

        if (!empty($request->jp_contact_id_2)) {
            foreach ($request->jp_contact_id_2 as $jp_contact_id) {
                $jp2_contact_project = new Jp2ContactProject();
                $jp2_contact_project->project_id = $project->id;
                $jp2_contact_project->jp_contact_id = $jp_contact_id;
                $jp2_contact_project->save();
            }
        }

        if (!empty($request->jp_contact_id_3)) {
            foreach ($request->jp_contact_id_3 as $jp_contact_id) {
                $jp3_contact_project = new Jp3ContactProject();
                $jp3_contact_project->project_id = $project->id;
                $jp3_contact_project->jp_contact_id = $jp_contact_id;
                $jp3_contact_project->save();
            }
        }

        if ($request->moc == 1) {
            $moc_boards = $request->moc_boards;

            if (!empty($moc_boards)) {
                foreach ($moc_boards as $moc_board) {

                    $moc_board_project = new MocBoardProject();
                    $moc_board_project->project_id = $project->id;
                    $moc_board_project->moc_board_id = $moc_board;
                    $moc_board_project->save();
                }
            }

            $moc_credit_types = $request->moc_credit_types;

            if (!empty($moc_credit_types)) {
                foreach ($moc_credit_types as $moc_credit_type) {

                    $moc_credit_type_project = new MocCreditTypeProject();
                    $moc_credit_type_project->project_id = $project->id;
                    $moc_credit_type_project->moc_credit_type_id = $moc_credit_type;
                    $moc_credit_type_project->save();
                }
            }

            $moc_practices = $request->moc_practices;

            if (!empty($moc_practices)) {
                foreach ($moc_practices as $moc_practice) {

                    $moc_practice_project = new MocPracticeProject();
                    $moc_practice_project->project_id = $project->id;
                    $moc_practice_project->moc_practice_id = $moc_practice;
                    $moc_practice_project->save();
                }
            }
        }

        $accreditation_types = $request->accreditation_types;


        if (!empty($accreditation_types)) {
            foreach ($accreditation_types as $key => $accreditation_type) {
                $credit_type_project = new CreditTypeProject();
                $credit_type_project->project_id = $project->id;
                $credit_type_project->credit_type_id = $accreditation_type;

                // $mli = 'mli_' . $accreditation_type;
                // $mli_text = 'mli_text_' . $accreditation_type;
                $mli_data = [
                    'mli'      => !empty($request->mli[$key]) ? true : false,
                    'mli_text' => null,
                ];
                $credit_type_project->mli = json_encode($mli_data);

                $level_data = 'level_data_' . $accreditation_type;
                $credit_type_project->level_data = $request->$level_data;

                $pharmacology_amount = 'pharmacology_amount' . $accreditation_type;
                $credit_type_project->pharmacology_amount = $request->$pharmacology_amount;

                $criteria = 'criteria_' . $accreditation_type;
                $credit_type_project->criteria = json_encode($request->$criteria);

                $credit_type_project->save();
            }
        }

        $accreditation_types_non_mli = $request->accreditation_types_non_mli;


        if (!empty($accreditation_types_non_mli)) {
            foreach ($accreditation_types_non_mli as $key => $accreditation_type) {
                $credit_type_project = new CreditTypeNonMliProject();
                $credit_type_project->project_id = $project->id;
                $credit_type_project->credit_type_id = $accreditation_type;

                // $mli = 'non_mli_' . $accreditation_type;
                // $mli_text = 'non_mli_text_' . $accreditation_type;               
                $mli_data = [
                    'mli'      => !empty($request->non_mli[$key]) ? true : false,
                    'mli_text' => null,
                ];
                $credit_type_project->mli = json_encode($mli_data);

                $level_data = 'non_mli_level_data_' . $accreditation_type;
                $credit_type_project->level_data = $request->$level_data;

                $pharmacology_amount = 'non_mli_pharmacology_amount' . $accreditation_type;
                $credit_type_project->pharmacology_amount = $request->$pharmacology_amount;

                $criteria = 'non_mli_criteria_' . $accreditation_type;
                $credit_type_project->criteria = json_encode($request->$criteria);

                $credit_type_project->save();
            }
        }

        $audience_types = $request->target_audience;


        if (!empty($audience_types)) {
            foreach ($audience_types as $audience_type) {
                if ($audience_type != "Other members") {
                    $audience_type_project = new AudienceTypeProject();
                    $audience_type_project->project_id = $project->id;
                    $audience_type_project->audience_type_id = $audience_type;
                    $audience_type_project->save();
                }
            }
        }

        $users = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['ED', 'ADMIN']);
        })->get();

        Notification::send($users, new ProjectMessage($project->activity_id, $project->id, 'A new project (' . $project->activity_id . ') proposal has received.'));

        return response()->json([
            'success' => true,
            'message' => 'Project created successfully.'
        ]);
    }
}
