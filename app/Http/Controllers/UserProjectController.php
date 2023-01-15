<?php

namespace App\Http\Controllers;

use App\Exports\ActivityExport;
use App\Exports\UserActivityExport;
use App\Project;
use App\ProjectStatus;
use App\User;
use Illuminate\Http\Request;
use Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class UserProjectController extends Controller
{


    public function index(Request $request)
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

        $auth_user = Auth::user();
        $user_role = $auth_user->role();

        $data['user_role'] = $user_role;      

        if ($user_role == "ADMIN") {
            $q = Project::with('managedby')->with('assignedto')->with('usedby')->with('project_status');
        } else {
            $q = Project::where(function ($query) use ($auth_user) {
                $query->orWhere('used_by', $auth_user->id)
                    ->orWhere('assigned_to', $auth_user->id)
                    ->orWhere('managed_by', $auth_user->id);
            })->with('managedby')->with('assignedto')->with('usedby')->with('project_status');
        }

        $status = $request->status;
        if (empty($request->status)) {
            $status = 'all';
        }
        $data['status_id'] = $status;

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

        $projects = $q->orderBy($orderBy, $sort_order)->paginate(15);

        $user_id = $auth_user->id;

        if ($user_role == "ADMIN") {
            $project_status = ProjectStatus::withCount('projects')->get();
        } else {
            $project_status = ProjectStatus::withCount([
                'projects' => function ($query) use ($user_id) {
                    $query->where('used_by', $user_id)->orWhere('assigned_to', $user_id)->orWhere('managed_by', $user_id);
                }
            ])->get();
        }

        $data['project_status'] = $project_status;

        $data['projects'] = $projects;

        $users = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'PM');
            }
        )->pluck('initials', 'id');

        $data['users'] = $users;

        return view('backend.project.user-projects', $data);
    }

    public function pdf(Request $request)
    {  

        $filter = $request->q;

        $pm = $request->pm;

        $status = $request->status;

        if (empty($request->status)) {
            $status = 'all';
        }

        $auth_user = Auth::user();
        $user_role = $auth_user->role();

        if ($user_role == "ADMIN") {
            $q = Project::with('managedby')->with('assignedto')->with('usedby')->with('project_status');
        } else {
            $q = Project::where(function ($query) use ($auth_user) {
                $query->orWhere('used_by', $auth_user->id)
                    ->orWhere('assigned_to', $auth_user->id)
                    ->orWhere('managed_by', $auth_user->id);
            })->with('managedby')->with('assignedto')->with('usedby')->with('project_status');
        }

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
        return Excel::download(new UserActivityExport(), 'Activity-Report.csv');
    }

    public function excel()
    {
        return Excel::download(new UserActivityExport(), 'Activity-Report.xls');
    }
}
