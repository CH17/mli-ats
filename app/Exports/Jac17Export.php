<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Jac17Export implements FromView
{

    public function view(): View
    {
        $projects = Project::where('jac17', 1);

        return view('backend.report.template.jac17-table', [
            'projects' => $projects->get()
        ]);
    }
}
