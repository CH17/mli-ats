<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();

        $project_status = ProjectStatus::withCount('projects')->get();

        $data['project_status'] = $project_status;
        $data['total_projects'] = Project::count();
        
        $weekly_project_status = DB::table('weekly_status_reports')->orderBy('updated_at', 'desc')->first();

        $data['weekly_project_status'] = $weekly_project_status;

        $users = User::select('id', 'name', 'initials')->whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'PM');
            }
        )->withCount([
            'project_user' => function ($query) {
                $query->where('status_id', '!=', 9);
            },
            'project_user as planning' => function ($query) {
                $query->where('status_id', 3);
            },
            'project_user as analysis' => function ($query) {
                $query->where('status_id', 6);
            },
        ])
            ->orderBy('project_user_count', 'DESC')
            ->get();



        // $qtd_from = date('2019-01-01');
        // $qtd_to = date('2021-06-30');

        // $qtd_projects_count =  Project::whereBetween('start_date', [$qtd_from, $qtd_to])->count();
        // $qtd__ipce_projects_count =  Project::where('accreditation_type_4_ipce', '=', "IPCE")->whereBetween('start_date', [$qtd_from, $qtd_to])->count();

        // $qtd_percentage = number_format($qtd__ipce_projects_count / $qtd_projects_count, 2);

        // $qtd_info['qtd_to'] = $qtd_to;
        // $qtd_info['qtd_from'] = $qtd_from;
        // $qtd_info['qtd_projects_count'] = $qtd_projects_count;
        // $qtd_info['qtd__ipce_projects_count'] = $qtd__ipce_projects_count;
        // $qtd_info['qtd_percentage'] = $qtd_percentage;

        // $data['qtd_info'] = $qtd_info;

       
       $ipce_projects = DB::select("SELECT count(id) as total_count, count(case accreditation_type_4_ipce when 'IPCE' then 1
                            else null end) as qtd_ipce_projects_count, YEAR(start_date) yr, QUARTER(start_date) qt
                            FROM projects
                            GROUP BY yr, qt
                            ORDER BY yr DESC, qt DESC;");
                
        $data['ipce_projects'] = $ipce_projects;

        $data['users'] = $users;


        $expired_projects = Project::with(['managedby'])
                            ->where('status_id', 5)
                            ->whereDate('expiration_date', '<', date('Y-m-d'))
                            ->select('id', 'activity_id', 'expiration_date', 'managed_by')
                            ->get();

        $data['expired_projects'] = $expired_projects;

        //dd($data);

        return view('backend/index', $data);
    }


    public function noAccess()
    {
        return view('backend/error/no-access');
    }
}
