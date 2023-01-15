<?php

namespace App\Exports;

use App\Project;
use App\ProjectStatus;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class ActivityExport implements FromView
{

    public function view(): View
    {      

        $filter = request()->q;

        $pm = request()->pm;

        $status = request()->status;

        if (empty(request()->status)) {
            $status = 'all';
        }

         $q = Project::with(['managedby'=>function($c){
                            $c->select('id', 'initials');
                        }]);       
        

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

       

        return view('backend.project.template.projects-report', $data);
    }
}
