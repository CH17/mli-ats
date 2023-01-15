<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExpiredActivityExport implements FromView
{

    public function view(): View
    {

        $projects = Project::where('status_id', 6)->whereDate('expiration_date', '<', today())
            ->orderBy('expiration_date', 'desc');

        return view('backend.report.template.accreditation-table', [
            'projects' => $projects->get()
        ]);
    }
}
