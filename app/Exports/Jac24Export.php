<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac24Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac24', 1);

        return view('backend.report.template.jac24-table', [
            'projects' => $projects->get()
        ]);
    }
}
