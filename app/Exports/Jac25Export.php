<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac25Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac25', 1);

        return view('backend.report.template.jac25-table', [
            'projects' => $projects->get()
        ]);
    }
}
