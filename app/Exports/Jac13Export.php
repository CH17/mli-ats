<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac13Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac13', 1);

        return view('backend.report.template.jac13-table', [
            'projects' => $projects->get()
        ]);
    }
}
