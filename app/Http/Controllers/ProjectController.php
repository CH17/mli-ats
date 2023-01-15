<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\File;
use App\User;
use App\Setting;
use \App\Project;
use App\IlnaCode;
use App\MocBoard;
use Notification;
use App\EpContact;
use App\JpContact;

use App\CreditType;
use App\MocPractice;
use App\ProjectMeta;
use App\AudienceType;
use App\JointProvider;
use App\MocCreditType;
use App\ProjectStatus;
use App\MocBoardProject;
use App\Users\UserLists;
use App\EpContactProject;
use App\JpContactProject;
use App\CreditTypeProject;
use App\Ep1ContactProject;
use App\Ep2ContactProject;
use App\Jp2ContactProject;
use App\Jp3ContactProject;
use App\EducationalPartner;
use App\MocPracticeProject;
use App\AudienceTypeProject;
use Illuminate\Http\Request;
use App\MocCreditTypeProject;
use App\Exports\ActivityExport;
use App\CreditTypeNonMliProject;
use Illuminate\Support\Facades\DB;
use App\Formatter\ProjectFormatter;
use App\Jobs\SendStartActivityMail;
use App\Validator\ProjectValidator;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\ProjectMessage;
use Illuminate\Support\Facades\Redirect;
use App\FileUploader\ProjectFileUploader;
use App\ReadNotification\ReadNotification;
use App\NextBusinessDate\GetNextBusinessDate;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $sort_order = 'desc';

        if (!empty($request->sort_order)) {
            $sort_order = $request->sort_order;
        }

        $data['next_order'] = ($sort_order == 'asc') ? 'desc' : 'asc';

        $orderBy = ($request->order_by) ? $request->order_by : 'updated_at';

        $filter = $request->q;
        $data['filter'] = $filter;

        $pm = $request->pm;
        $data['pm'] = $pm;

        $status = ($request->status) ? $request->status : 'all';

        $data['status_id'] = $status;

        $data['on_hold'] = (!empty($request->on_hold)) ? 'yes' : '';

        $q = Project::with(['managedby', 'project_status', 'joint_provider', 'educational_partner_1']);

        if (!empty($status) && $status != 'all') {
            $q->where('status_id', $status);
        }

        if ($request->on_hold == 'yes') {
            $q->where(function ($query) {
                $query->where('is_ats_form_ready', 2);
            });
        }

        $searchFields = ['project_code', 'activity_id', 'activity_title', 'jp_cr_code', 'ep_cr_code_1', 'ep_cr_code_2', 'jp_cr_code_2','managed_by'];

        if (!empty($filter) && empty($pm)) {
            $q->where(function ($query) use ($filter, $searchFields) {
                $searchWildcard = $filter;
                foreach ($searchFields as $field) {
                    $query->orWhere($field, $searchWildcard);
                }
            });
        }

        if (!empty($pm) && empty($filter)) {
            $q->where(function ($query) use ($pm, $searchFields) {
                $searchWildcard = $pm;
                foreach ($searchFields as $field) {
                    $query->orWhere($field, $searchWildcard);
                }
            });
        }

        if (!empty($pm) && !empty($filter)) {
            $q->where(function ($query) use ($filter, $pm, $searchFields) {
                $searchWildcard = [$filter, $pm];
                foreach ($searchFields as $field) {
                    $query->orWhereIn($field, $searchWildcard);
                }
            });
        }

        $project_on_hold = Project::selectRaw("COUNT(CASE WHEN is_ats_form_ready = 2 then 1 end) AS on_hold_count")->first();


        $data['on_hold_count'] = $project_on_hold->on_hold_count;


        $projects = $q->orderBy($orderBy, $sort_order)->paginate(15);

        $project_status = ProjectStatus::withCount('projects')->get();

        $data['project_status'] = $project_status;

        $data['projects'] = $projects;

        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'PM');
            }
        )->pluck('initials', 'id');

        $data['users'] = $users;

        return view('backend.project.projects', $data);
    }


    public function pdf(Request $request)
    {

        $filter = $request->q;

        $pm = $request->pm;

        $status = $request->status;

        if (empty($request->status)) {
            $status = 'all';
        }


        $q = Project::with('managedby')->with('assignedto')->with('usedby')->with('project_status');

        if (!empty($status) && $status != 'all') {
            $q->where('status_id', $status);
        }

        $searchFields = ['project_code', 'activity_id', 'activity_title', 'jp_cr_code', 'managed_by'];

        if (!empty($filter) && empty($pm)) {
            $q->where(function ($query) use ($filter, $searchFields) {
                $searchWildcard = $filter;
                foreach ($searchFields as $field) {
                    $query->orWhere($field, $searchWildcard);
                }
            });
        }

        if (!empty($pm) && empty($filter)) {
            $q->where(function ($query) use ($pm, $searchFields) {
                $searchWildcard = $pm;
                foreach ($searchFields as $field) {
                    $query->orWhere($field, $searchWildcard);
                }
            });
        }

        if (!empty($pm) && !empty($filter)) {
            $q->where(function ($query) use ($filter, $pm, $searchFields) {
                $searchWildcard = [$filter, $pm];
                foreach ($searchFields as $field) {
                    $query->orWhereIn($field, $searchWildcard);
                }
            });
        }

        $projects = $q->orderBy('updated_at', 'desc')->get();

        $data['projects'] = $projects;

        if ($status != 'all') {
            $project_status = ProjectStatus::find($status)->name;
        } else {
            $project_status = null;
        }

        $data['project_status'] = $project_status;

        $pdf = PDF::loadView('backend.project.template.projects-report', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('Activity-Report.pdf');
    }

    public function csv()
    {
      return Excel::download(new ActivityExport(), 'Activity-Report_'.date('Y-m-d').'_'.time().'.csv');
    }

    public function excel()
    {
        return Excel::download(new ActivityExport(), 'Activity-Report_'.date('Y-m-d').'_'.time().'.xls');
    }

    public function unassigned(Request $request)
    {
        $sort_order = 'desc';

        if (!empty($request->sort_order)) {
            $sort_order = $request->sort_order;
        }

        if ($sort_order == 'asc') {
            $next_order = 'desc';
        } else {
            $next_order = 'asc';
        }

        $data['next_order'] = $next_order;

        $orderBy = 'updated_at';

        if (!empty($request->order_by)) {
            $orderBy = $request->order_by;
        }

        $filter = $request->q;
        $data['filter'] = $filter;

        $pm = $request->pm;
        $data['pm'] = $pm;

        $data['user_role'] = Auth::user()->role();
        $status = $request->status;
        if (empty($request->status)) {
            $status = 'all';
        }
        $data['status_id'] = $status;

        $q = Project::doesntHave('managedby')->with('managedby')->with('project_status');


        $searchFields = ['project_code', 'activity_id', 'activity_title', 'jp_cr_code', 'managed_by'];


        if (!empty($filter) && empty($pm)) {
            $q->where(function ($query) use ($filter, $searchFields) {
                $searchWildcard = $filter;
                foreach ($searchFields as $field) {
                    $query->orWhere($field, $searchWildcard);
                }
            });
        }

        if (!empty($pm) && empty($filter)) {
            $q->where(function ($query) use ($pm, $searchFields) {
                $searchWildcard = $pm;
                foreach ($searchFields as $field) {
                    $query->orWhere($field, $searchWildcard);
                }
            });
        }

        if (!empty($pm) && !empty($filter)) {
            $q->where(function ($query) use ($filter, $pm, $searchFields) {
                $searchWildcard = [$filter, $pm];
                foreach ($searchFields as $field) {
                    $query->orWhereIn($field, $searchWildcard);
                }
            });
        }

        $projects = $q->orderBy($orderBy, $sort_order)->paginate(15);

        $data['projects'] = $projects;

        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'PM');
            }
        )->pluck('initials', 'id');

        $data['users'] = $users;

        return view('backend.project.unassigned-projects', $data);
    }

    public function emPlanning(Request $request)
    {

        $aid = $request->aid;
        $data['aid'] = $aid;

        $mlip = $request->mlip;
        $data['mlip'] = $mlip;

        $pm = $request->pm;
        $data['pm'] = $pm;

        $data['user_role'] = Auth::user()->role();

        $q = Project::with(['managedby', 'joint_provider', 'project_status']);

        if (!empty($aid) && empty($mlip) && empty($pm)) {
            $q->where('activity_id', 'LIKE', '%' . $aid . '%')
                ->where(
                    function ($query) {
                        $query->where('status_id', 3)->orWhere('status_id', 4);
                    }
                );
        } else if (!empty($mlip) && empty($aid) && empty($pm)) {
            $q->where('project_code', 'LIKE', '%' . $mlip . '%')
                ->where(
                    function ($query) {
                        $query->where('status_id', 3)->orWhere('status_id', 4);
                    }
                );
        } else if (!empty($pm) && empty($aid) && empty($mlip)) {
            $q->where('managed_by', 'LIKE', '%' . $pm . '%')
                ->where(
                    function ($query) {
                        $query->where('status_id', 3)->orWhere('status_id', 4);
                    }
                );
        } else if (!empty($aid) && !empty($pm) && empty($mlip)) {
            $q->where(
                function ($query) use ($aid, $pm) {
                    $query->where('activity_id', 'LIKE', '%' . $aid . '%')
                        ->orWhere('managed_by', 'LIKE', '%' . $pm . '%');
                }
            )->where(
                function ($query) {
                    $query->where('status_id', 3)->orWhere('status_id', 4);
                }
            );
        } else if (!empty($aid) && !empty($mlip) && empty($pm)) {
            $q->where(
                function ($query) use ($aid, $mlip) {
                    $query->where('activity_id', 'LIKE', '%' . $aid . '%')
                        ->orWhere('project_code', 'LIKE', '%' . $mlip . '%');
                }
            )->where(
                function ($query) {
                    $query->where('status_id', 3)->orWhere('status_id', 4);
                }
            );
        } else if (!empty($pm) && !empty($mlip) && empty($aid)) {
            $q->where(
                function ($query) use ($pm, $mlip) {
                    $query->where('managed_by', 'LIKE', '%' . $pm . '%')
                        ->orWhere('project_code', 'LIKE', '%' . $mlip . '%');
                }
            )->where(
                function ($query) {
                    $query->where('status_id', 3)->orWhere('status_id', 4);
                }
            );
        } else if (!empty($aid) && !empty($mlip) && !empty($pm)) {
            $q->where(
                function ($query) use ($aid, $mlip, $pm) {
                    $query->where('activity_id', 'LIKE', '%' . $aid . '%')
                        ->orWhere('project_code', 'LIKE', '%' . $mlip . '%')
                        ->orWhere('managed_by', 'LIKE', '%' . $pm . '%');
                }
            )->where(
                function ($query) {
                    $query->where('status_id', 3)->orWhere('status_id', 4);
                }
            );
        } else {
            $q->where(function ($query) {
                    $query->where('status_id', 3)->orWhere('status_id', 4);
                });
        }

        $q->where('is_ats_form_ready', '!=', 2);

        $today = Date('Y-m-d');
     //   $last_day = Date('Y-m-d', strtotime('-5 days'));


    //    $q->whereDate('start_date', '>=', $last_day);

        $q->select('*',
                        \DB::raw('(CASE
                                    WHEN start_date <= "'.$today.'" THEN "em_warning_red"
                                    WHEN start_date >= "'.$today.'" AND due_date <= "'.$today.'"  THEN "em_warning_yellow "
                                    ELSE "None"
                                    END) AS color_code'));


        $q->orderBy(DB::raw('ABS(DATEDIFF(start_date, NOW()))'));

        $projects = $q->paginate(15);


        $data['projects'] = $projects;

        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'PM');
            }
        )->pluck('initials', 'id');

        $data['users'] = $users;


        return view('backend.project.em-planning-projects', $data);
    }


    public function show($id)
    {


        if (!empty($_GET['notification_id'])) {
            $read_notification = new ReadNotification();
            $read_notification->read($_GET['notification_id']);
        }


        $project = Project::where('id', $id)->with('audience_types')->with('project_status')->firstOrFail();

        $next_status = '';

        if ($project->project_status->id != 9) {
            $next_status_id = $project->project_status->id + 1;

            $next_status = ProjectStatus::where('id', $next_status_id)->first();
        }

        $data['next_status'] = $next_status;

        $project_status = ProjectStatus::pluck('name', 'id');

        $data['project_status'] = $project_status;

        $data['project'] = $project;

        $data['user_role'] = Auth::user()->role();
        $data['is_user'] = Auth::user()->isProjectUser($project->id);

        $user_lists = new UserLists();
        $data['user_array'] = $user_lists->userArray();
        $data['attachments'] = $project->files->groupBy('type');

        return view('backend.project.project', $data);
    }


    public function edit($id)
    {
        $joint_providers = JointProvider::all();
        $ilna_codes = IlnaCode::all();
        $educational_partners = EducationalPartner::all();


        $data['joint_providers']        = $joint_providers;
        $data['ilna_codes']             = $ilna_codes;
        $data['educational_partners']   = $educational_partners;

        $project = Project::where('id', $id)->with('audience_types')->firstOrFail();

        $jp_contacts = ($project->jp_id) ? JpContact::where('jp_id', $project->jp_id)->get() : [];

        $data['jp_contacts'] =  $jp_contacts;


        $jp2_contacts = ($project->jp_id_2) ? JpContact::where('jp_id', $project->jp_id_2)->get() : [];

        $data['jp2_contacts'] =  $jp2_contacts;

        $jp3_contacts = ($project->jp_id_3) ? JpContact::where('jp_id', $project->jp_id_3)->get() : [];

        $data['jp3_contacts'] =  $jp3_contacts;

        $ep_contacts_1 = ($project->ep_id_1) ? EpContact::where('ep_id', $project->ep_id_1)->get() : [];

        $data['ep_contacts_1'] =  $ep_contacts_1;

        $ep_contacts_2 = ($project->ep_id_2) ? EpContact::where('ep_id', $project->ep_id_2)->get() : [];

        $data['ep_contacts_2'] =  $ep_contacts_2;

        $next_status = '';

        if (!empty($project->project_status) && $project->project_status->id != 9) {
            $next_status_id = $project->project_status->id + 1;

            $next_status = ProjectStatus::where('id', $next_status_id)->first();
        }
        $data['next_status'] = $next_status;

        $project_status = ProjectStatus::pluck('name', 'id');

        $data['project_status'] = $project_status;

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

        $data['user_role'] = Auth::user()->role();


        if (Auth::user()->role() != 'ADMIN' && Auth::user()->role() != 'ED' && !$project->has_user(Auth::user())) {
            abort(404);
        }
        $data['project'] = $project;
        $user_lists = new UserLists();
        $data['user_array'] = $user_lists->userArray();


        return view('backend/project/edit-project', $data);
    }



    public function update($id, Request $request)
    {
        $project = Project::find($id);

        $validation = new ProjectValidator();

        $validator1 = $validation->step1validation($request);


        if ($validator1->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator1->getMessageBag()->toArray()
            ]);
        }

        $validator3 = $validation->step3validation($request);


        if ($validator3->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $validator3->getMessageBag()->toArray()
            ]);
        }

        $project_data = new ProjectFormatter();

        $data = $project_data->updateFormat($request, $project);


        if (!empty($request->jp_contact_id)) {

            JpContactProject::where('project_id', $id)->delete();

            foreach ($request->jp_contact_id as $jp_contact_id) {
                $jp_contact_project = new JpContactProject();
                $jp_contact_project->project_id = $id;
                $jp_contact_project->jp_contact_id = $jp_contact_id;
                $jp_contact_project->save();
            }
        } else {
            JpContactProject::where('project_id', $id)->delete();
        }

        if (!empty($request->jp_contact_id_2)) {

            Jp2ContactProject::where('project_id', $id)->delete();

            foreach ($request->jp_contact_id_2 as $jp_contact_id) {
                $jp2_contact_project = new Jp2ContactProject();
                $jp2_contact_project->project_id = $id;
                $jp2_contact_project->jp_contact_id = $jp_contact_id;
                $jp2_contact_project->save();
            }
        } else {
            Jp2ContactProject::where('project_id', $id)->delete();
        }


        if (!empty($request->jp_contact_id_3)) {

            Jp3ContactProject::where('project_id', $id)->delete();

            foreach ($request->jp_contact_id_3 as $jp_contact_id) {
                $jp3_contact_project = new Jp3ContactProject();
                $jp3_contact_project->project_id = $id;
                $jp3_contact_project->jp_contact_id = $jp_contact_id;
                $jp3_contact_project->save();
            }
        } else {
            Jp3ContactProject::where('project_id', $id)->delete();
        }


        if (!empty($request->ep_contact_id_1)) {

            Ep1ContactProject::where('project_id', $id)->delete();

            foreach ($request->ep_contact_id_1 as $ep_contact_id) {
                $ep_contact_project = new Ep1ContactProject();
                $ep_contact_project->project_id = $id;
                $ep_contact_project->ep_contact_id = $ep_contact_id;
                $ep_contact_project->save();
            }
        } else {
            Ep1ContactProject::where('project_id', $id)->delete();
        }


        if (!empty($request->ep_contact_id_2)) {

            Ep2ContactProject::where('project_id', $id)->delete();

            foreach ($request->ep_contact_id_2 as $ep_contact_id) {
                $ep_contact_project = new Ep2ContactProject();
                $ep_contact_project->project_id = $id;
                $ep_contact_project->ep_contact_id = $ep_contact_id;
                $ep_contact_project->save();
            }
        } else {
            Ep2ContactProject::where('project_id', $id)->delete();
        }


        if ($request->moc == 0) {
            MocBoardProject::where('project_id', $id)->delete();
            MocCreditTypeProject::where('project_id', $id)->delete();
            MocPracticeProject::where('project_id', $id)->delete();
        } else {
            $moc_boards = $request->moc_boards;

            if (!empty($moc_boards)) {

                MocBoardProject::where('project_id', $id)->delete();

                foreach ($moc_boards as $moc_board) {

                    $moc_board_project = new MocBoardProject();
                    $moc_board_project->project_id = $project->id;
                    $moc_board_project->moc_board_id = $moc_board;
                    $moc_board_project->save();
                }
            } else {
                MocBoardProject::where('project_id', $id)->delete();
            }

            $moc_credit_types = $request->moc_credit_types;

            if (!empty($moc_credit_types)) {

                MocCreditTypeProject::where('project_id', $id)->delete();

                foreach ($moc_credit_types as $moc_credit_type) {

                    $moc_credit_type_project = new MocCreditTypeProject();
                    $moc_credit_type_project->project_id = $project->id;
                    $moc_credit_type_project->moc_credit_type_id = $moc_credit_type;
                    $moc_credit_type_project->save();
                }
            } else {
                MocCreditTypeProject::where('project_id', $id)->delete();
            }

            $moc_practices = $request->moc_practices;

            if (!empty($moc_practices)) {

                MocPracticeProject::where('project_id', $id)->delete();

                foreach ($moc_practices as $moc_practice) {

                    $moc_practice_project = new MocPracticeProject();
                    $moc_practice_project->project_id = $project->id;
                    $moc_practice_project->moc_practice_id = $moc_practice;
                    $moc_practice_project->save();
                }
            } else {
                MocPracticeProject::where('project_id', $id)->delete();
            }
        }

        $accreditation_types = $request->accreditation_types;

        CreditTypeProject::where('project_id', $id)->delete();

        if (!empty($accreditation_types)) {

            foreach ($accreditation_types as $key => $accreditation_type) {
                $credit_type_project = new CreditTypeProject();
                $credit_type_project->project_id = $project->id;
                $credit_type_project->credit_type_id = $accreditation_type;

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

        CreditTypeNonMliProject::where('project_id', $id)->delete();

        if (!empty($accreditation_types_non_mli)) {

            foreach ($accreditation_types_non_mli as $key => $accreditation_type) {
                $credit_type_project = new CreditTypeNonMliProject();
                $credit_type_project->project_id = $project->id;
                $credit_type_project->credit_type_id = $accreditation_type;

                $mli_data = [
                    'mli'      => !empty($request->non_mli[$key]) ? true : false,
                    'mli_text' => null,
                ];
                $credit_type_project->mli = json_encode($mli_data);

                $accreditor = 'non_mli_accreditor_' . $accreditation_type;
                $credit_type_project->accreditor = $request->$accreditor;

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

            AudienceTypeProject::where('project_id', $id)->delete();

            foreach ($audience_types as $audience_type) {
                if ($audience_type != "Other members") {
                    $audience_type_project = new AudienceTypeProject();
                    $audience_type_project->project_id = $project->id;
                    $audience_type_project->audience_type_id = $audience_type;
                    $audience_type_project->save();
                }
            }
        }

        $setting = new Setting();
        $due_days = !empty($setting->getSetting('due_days')) ? $setting->getSetting('due_days') : 3;

        $get_next_business_date = new GetNextBusinessDate();
        $next_business_date = $get_next_business_date->addBusinessDays(strtotime($request->start_date), $due_days);

        $data['project_info']['due_date'] = $next_business_date;



        $project->update($data['project_info']);

        $project_meta = $project->meta ?: new ProjectMeta();
        foreach ($data['project_meta'] as $key => $data) {
            $project_meta->$key = $data;
        }

        $project->meta()->save($project_meta);


        // if (count($project->getChanges())) {
        //     $users = $project->notifyableusers();

        //     Notification::send($users, new ProjectMessage($project->activity_id, $project->id, $project->activity_id . ': ' . Auth::user()->name . ' made some changes.'));
        // }

        return response()->json(['success' => true]);
    }


    public function clone(Request $request, $id)
    {

        $project = Project::where('id', $id)->with(['moc_boards', 'moc_credit_types', 'moc_practices', 'accreditation_types', 'meta', 'audience_types'])->first();
        $new_project = $project->replicate();
        $new_project->activity_id = "P" . date('y') . rand(100, 999);

        $new_project_meta = $new_project->meta;

        $new_project->save();

        unset($new_project_meta->id);
        unset($new_project_meta->project_id);
        $new_project->meta()->create($new_project_meta->toArray());

        $user_ids = array();

        if (!empty($new_project->managed_by)) {
            $user_ids[] = $new_project->managed_by;
        }
        if (!empty($new_project->assigned_to)) {
            $user_ids[] = $new_project->assigned_to;
        }
        if (!empty($new_project->used_by)) {
            $user_ids[] = $new_project->used_by;
        }

        $new_project->users()->sync($user_ids);



        if(count($project->files)){
            $files = $project->files;
            foreach ($files as $file) {
                 $project_file = new File();
                 $project_file->project_id      = $new_project->id;
                 $project_file->file            = $file->file;
                 $project_file->status          = 'not-reviewed';
                 $project_file->type            = $file->type;

                 $project_file->save();
            }
        }

        if ($project->moc == 1) {
            $moc_boards = $project->moc_boards;

            if (!empty($moc_boards)) {

                foreach ($moc_boards as $moc_board) {

                    $moc_board_project = new MocBoardProject();
                    $moc_board_project->project_id = $new_project->id;
                    $moc_board_project->moc_board_id = $moc_board->id;
                    $moc_board_project->save();
                }
            }

            $moc_credit_types = $project->moc_credit_types;

            if (!empty($moc_credit_types)) {

                foreach ($moc_credit_types as $moc_credit_type) {

                    $moc_credit_type_project = new MocCreditTypeProject();
                    $moc_credit_type_project->project_id = $new_project->id;
                    $moc_credit_type_project->moc_credit_type_id = $moc_credit_type->id;
                    $moc_credit_type_project->save();
                }
            }

            $moc_practices = $project->moc_practices;

            if (!empty($moc_practices)) {

                foreach ($moc_practices as $moc_practice) {

                    $moc_practice_project = new MocPracticeProject();
                    $moc_practice_project->project_id = $new_project->id;
                    $moc_practice_project->moc_practice_id = $moc_practice->id;
                    $moc_practice_project->save();
                }
            }
        }

        $accreditation_types = $project->accreditation_types;

        if (!empty($accreditation_types)) {
            foreach ($accreditation_types as $accreditation_type) {

                $credit_type_project = new CreditTypeProject();
                $credit_type_project->project_id = $new_project->id;
                $credit_type_project->credit_type_id = $accreditation_type->id;
                $credit_type_project->save();
            }
        }

        $audience_types = $project->audience_types;


        if (!empty($audience_types)) {
            foreach ($audience_types as $audience_type) {
                if ($audience_type != "Other members") {
                    $audience_type_project = new AudienceTypeProject();
                    $audience_type_project->project_id = $new_project->id;
                    $audience_type_project->audience_type_id = $audience_type->id;
                    $audience_type_project->save();
                }
            }
        }

        $users = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['ED', 'ADMIN']);
        })->get();

        foreach ($users as $user) {
            dispatch(new SendStartActivityMail($project, $user->email));
        }

       // Notification::send($users, new ProjectMessage($new_project->activity_id, $new_project->id, 'A new project (' . $new_project->activity_id . ') proposal has received.'));

        return redirect()->back()->with('success', 'The project has been cloned successfully.');
    }

    public function updateNotes(Project $project, Request $request)
    {

        $data['notes'] = $request->notes;
        $data['doa_or_ed_notes'] = $request->doa_or_ed_notes;
        $data['is_ats_form_ready'] = !empty($request->is_ats_form_ready) ? $request->is_ats_form_ready : 0;
        $project->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Successfully Updated.',
            'data' => $data,
        ]);
    }

    public function updateMemo(Project $project, Request $request)
    {

        $data['attachment4_memo'] = $request->attachment4_memo;
        $project->update($data);

        return Redirect::back();
    }

    public function updateRelatedDocuments(Project $project, Request $request)
    {
        $project_file = new ProjectFileUploader();
        $project_code = !empty($project->project_code) ? $project->project_code : $project->activity_id;
        $files = $project_file->uploadRelatedDocuments($request, $project_code);

        $related_documents = json_decode($project->related_documents, true);

        $remove_rel_docs = $request->remove_rel_docs;

        if (!empty($remove_rel_docs)) {
            foreach ($remove_rel_docs as $value) {
                unset($related_documents[$value]);
            }
            $related_documents = array_values($related_documents);
        }

        if (isset($related_documents) && !empty($request->file('related_documents'))) {
            $value = $files['related_documents'];
            $files['related_documents'] = array_merge($value, $related_documents);
        } else if (isset($related_documents) && empty($request->file('related_documents'))) {
            $files['related_documents'] = $related_documents;
        }

        $data['related_documents'] = !empty($files['related_documents']) ? json_encode($files['related_documents']) : null;

        $project->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Successfully Updated.'
        ]);
    }

    public function destroy($id)
    {

        $project = Project::findOrFail($id);

        DB::table('notifications')
            ->where('activity_id', $project->activity_id)
            ->delete();

        $project->delete();

        return Redirect::back()->with('success', 'The project has been deleted successfully.');
    }

    public function removeConInd(Request $request)
    {
        $project = Project::find($request->project_id);

        $control_individuals = (array) json_decode($project->meta->controll_individuals);

        $count = 1;
        $data = null;
        foreach ($control_individuals as $key => $control_individual) {
            if ($key == $request->count) {
                continue;
            } else {
                $data[$count]['name_of_individual'] = $control_individual->name_of_individual;
                $data[$count]['role_in_activity'] = $control_individual->role_in_activity;
                $data[$count]['commercial_interest'] = $control_individual->commercial_interest;
                $data[$count]['nature_of_relationship'] = $control_individual->nature_of_relationship;
                $count++;
            }
        }

        $project->meta()->update([
            'controll_individuals' => json_encode($data) ?? null
        ]);

        return [$project->meta->controll_individuals];
    }
}
