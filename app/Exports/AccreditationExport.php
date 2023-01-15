<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AccreditationExport implements FromView
{

    public function view(): View
    {

        $projects = Project::where('status_id', 3)
            ->where('has_commercial_support', 'Yes')
            ->where('has_loa', 1)
            ->orderBy('expiration_date', 'desc');

        return view('backend.report.template.accreditation-table', [
            'projects' => $projects->get()
        ]);
    }
}
