<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectStatus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectLoadController extends Controller
{
    public function index(Request $request)
    {              
        $role = !empty($request->role) ? $request->role : ['PM'];

        $data['role'] = $role;

        $users = User::whereHas(
            'roles',
            function ($q) use ($role) {
                $q->whereIn('name', $role);
            }
        )->withCount([
            'project_user' => function ($query) {
                $query->where('status_id', '!=', 9);
            },
            'project_user as proposed' => function ($query) {
                $query->where('status_id', 1);
            },
            'project_user as new' => function ($query) {
                $query->where('status_id', 2);
            },
            'project_user as planning' => function ($query) {
                $query->where('status_id', 3);
            },
            'project_user as ready' => function ($query) {
                $query->where('status_id', 4);
            },
            'project_user as active' => function ($query) {
                $query->where('status_id', 5);
            },
            'project_user as analysis' => function ($query) {
                $query->where('status_id', 6);
            },
            'project_user as audit' => function ($query) {
                $query->where('status_id', 7);
            },
            'project_user as approved' => function ($query) {
                $query->where('status_id', 8);
            },
            'project_user as closed' => function ($query) {
                $query->where('status_id', 9);
            },
        ])
            ->orderBy('project_user_count', 'DESC')
            ->paginate(20);

        $total_user_projects = $users->sum('project_user_count');
        $data['total_user_projects'] = $total_user_projects;


        $total_proposed = $users->sum('proposed');
        $data['total_proposed'] = $total_proposed;

        $propose_rate = 0;
        if ($total_user_projects > 0) {
            $propose_rate = number_format(($total_proposed * 100) / $total_user_projects, 2);
        }
        $data['propose_rate'] = $propose_rate;

        $total_new = $users->sum('new');
        $data['total_new'] = $total_new;

        $new_rate = 0;
        if ($total_user_projects > 0) {
            $new_rate = number_format(($total_new * 100) / $total_user_projects, 2);
        }
        $data['new_rate'] = $new_rate;

        $total_planning = $users->sum('planning');
        $data['total_planning'] = $total_planning;

        $planning_rate = 0;
        if ($total_user_projects > 0) {
            $planning_rate = number_format(($total_planning * 100) / $total_user_projects, 2);
        }
        $data['planning_rate'] = $planning_rate;

        $total_ready = $users->sum('ready');
        $data['total_ready'] = $total_ready;

        $ready_rate = 0;
        if ($total_user_projects > 0) {
            $ready_rate = number_format(($total_ready * 100) / $total_user_projects, 2);
        }
        $data['ready_rate'] = $ready_rate;

        $total_active = $users->sum('active');
        $data['total_active'] = $total_active;

        $active_rate = 0;
        if ($total_user_projects > 0) {
            $active_rate = number_format(($total_active * 100) / $total_user_projects, 2);
        }
        $data['active_rate'] = $active_rate;

        $total_analysis = $users->sum('analysis');
        $data['total_analysis'] = $total_analysis;

        $analysis_rate = 0;
        if ($total_user_projects > 0) {
            $analysis_rate = number_format(($total_analysis * 100) / $total_user_projects, 2);
        }
        $data['analysis_rate'] = $analysis_rate;

        $total_audit = $users->sum('audit');
        $data['total_audit'] = $total_audit;

        $audit_rate = 0;
        if ($total_user_projects > 0) {
            $audit_rate = number_format(($total_audit * 100) / $total_user_projects, 2);
        }
        $data['audit_rate'] = $audit_rate;

        $total_approved = $users->sum('approved');
        $data['total_approved'] = $total_approved;

        $approved_rate = 0;
        if ($total_user_projects > 0) {
            $approved_rate = number_format(($total_approved * 100) / $total_user_projects, 2);
        }
        $data['approved_rate'] = $approved_rate;

        $total_closed = $users->sum('closed');
        $data['total_closed'] = $total_closed;

        $closed_rate = 0;
        if ($total_user_projects > 0) {
            $closed_rate = number_format(($total_closed * 100) / $total_user_projects, 2);
        }
        $data['closed_rate'] = $closed_rate;

        $data['users'] = $users;


        return view('backend.project-load.index', $data);
    }
}
