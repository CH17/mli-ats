<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac18Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac18', 1);

        return view('backend.report.template.jac18-table', [
            'projects' => $projects->get()
        ]);
    }
}
