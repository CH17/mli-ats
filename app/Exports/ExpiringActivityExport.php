<?php

namespace App\Exports;

use App\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExpiringActivityExport implements FromView
{

    public function view(): View
    {
        $expire_in_date = today()->addDays(15);

        $projects = Project::where('status_id', 5)->whereDate('expiration_date', '>=', today())
            ->whereDate('expiration_date', '<', $expire_in_date)
            ->orderBy('expiration_date', 'asc');

        return view('backend.report.template.expiring-activity-table', [
            'projects' => $projects->get()
        ]);
    }
}
