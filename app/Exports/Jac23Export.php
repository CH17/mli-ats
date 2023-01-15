<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac23Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac23', 1);

        return view('backend.report.template.jac23-table', [
            'projects' => $projects->get()
        ]);
    }
}
