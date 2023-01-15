<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac14Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac14', 1);

        return view('backend.report.template.jac14-table', [
            'projects' => $projects->get()
        ]);
    }
}
