<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac19Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac19', 1);

        return view('backend.report.template.jac19-table', [
            'projects' => $projects->get()
        ]);
    }
}
