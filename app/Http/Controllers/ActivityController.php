<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\Project;
use App\Setting;
use App\MocBoard;
use Notification;
use App\EpContact;
use App\JpContact;
use App\MocPractice;
use App\ProjectMeta;
use App\AudienceType;
use App\JointProvider;
use App\MocCreditType;
use App\MocBoardProject;
use App\Users\UserLists;
use App\JpContactProject;
use App\Jp2ContactProject;
use App\Jp3ContactProject;
use App\MocPracticeProject;
use App\AudienceTypeProject;
use Illuminate\Http\Request;
use App\MocCreditTypeProject;
use App\Jobs\SendStartActivityMail;
use App\Validator\ProjectValidator;
use App\Formatter\ActivityFormatter;
use App\Notifications\ProjectMessage;
use App\NextBusinessDate\GetNextBusinessDate;

class ActivityController extends Controller
{
    public function create()
    {
        $joint_providers = JointProvider::all();

        $data['joint_providers'] = $joint_providers;

        $audience_types = AudienceType::all();

        $data['audience_types'] = $audience_types;

        $moc_boards = MocBoard::all();

        $data['moc_boards'] = $moc_boards;

        $moc_credit_types = MocCreditType::all();

        $data['moc_credit_types'] = $moc_credit_types;

        $moc_practices = MocPractice::all();

        $data['moc_practices'] = $moc_practices;

        $user_lists = new UserLists();

        $data['user_array'] = $user_lists->userArray();

        return view('backend.activity.index', $data);
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

        $project_data = new ActivityFormatter();
        $data = $project_data->format($request);

        $project = Project::create($data['project_info']);

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
            foreach ($request->jp_contact_id_2 as $jp_contact_id_2) {
                $jp2_contact_project = new Jp2ContactProject();
                $jp2_contact_project->project_id = $project->id;
                $jp2_contact_project->jp_contact_id = $jp_contact_id_2;
                $jp2_contact_project->save();
            }
        }

        if (!empty($request->jp_contact_id_3)) {
            foreach ($request->jp_contact_id_3 as $jp_contact_id_3) {
                $jp3_contact_project = new Jp3ContactProject();
                $jp3_contact_project->project_id = $project->id;
                $jp3_contact_project->jp_contact_id = $jp_contact_id_3;
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

        $project->assigned($request, $project);

        $users = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['ED', 'ADMIN', 'DoA']);
        })->get();

      //  Notification::send($users, new ProjectMessage($project->activity_id, $project->id, 'A new project (' . $project->activity_id . ') proposal has received.'));

        foreach ($users as $user) {                
            dispatch(new SendStartActivityMail($project, $user->email));
        }

        return response()->json([
            'success' => true,
            'message' => 'Activity added successfully.'
        ]);
    }

    public function getJpContacts(Request $request)
    {
        $jp_id = $request->jp_id;

        $jp_contacts = JpContact::where('jp_id', $jp_id)->get();

        $data['jp_contacts'] =  $jp_contacts;

        $jp_contacts_view = View::make('backend.activity.template.jp-contacts', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp_contacts_view' => $jp_contacts_view,
        ));
    }

    public function getJpContacts2(Request $request)
    {
        $jp_id_2 = $request->jp_id_2;

        $jp_contacts_2 = JpContact::where('jp_id', $jp_id_2)->get();

        $data['jp_contacts_2'] =  $jp_contacts_2;

        $jp_contacts_2_view = View::make('backend.activity.template.jp-contacts-2', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp_contacts_2_view' => $jp_contacts_2_view,
        ));
    }

    public function getJpContacts3(Request $request)
    {
        $jp_id_3 = $request->jp_id_3;

        $jp_contacts_3 = JpContact::where('jp_id', $jp_id_3)->get();

        $data['jp_contacts_3'] =  $jp_contacts_3;

        $jp_contacts_3_view = View::make('backend.activity.template.jp-contacts-3', $data)->render();

        return \Response::json(array(
            'success' => true,
            'jp_contacts_3_view' => $jp_contacts_3_view,
        ));
    }

    public function getEpContacts(Request $request)
    {
        $ep_id = $request->ep_id;


        $ep_contacts = EpContact::where('ep_id', $ep_id)->get();

        $data['ep_contacts'] =  $ep_contacts;

        $ep_contacts_view = View::make('backend.activity.template.ep-contacts', $data)->render();

        return \Response::json(array(
            'success' => true,
            'ep_contacts_view' => $ep_contacts_view,
        ));
    }

    public function getEpContacts2(Request $request)
    {
        $ep_id = $request->ep_id;


        $ep_contacts = EpContact::where('ep_id', $ep_id)->get();

        $data['ep_contacts'] =  $ep_contacts;

        $ep_contacts_view = View::make('backend.activity.template.ep-contacts-2', $data)->render();

        return \Response::json(array(
            'success' => true,
            'ep_contacts_view' => $ep_contacts_view,
        ));
    }
}
