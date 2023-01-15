<?php

namespace App\Http\Controllers;

use App\Exports\AccreditationExport;
use App\Exports\ExpiringActivityExport;
use App\Exports\ExpiredActivityExport;
use App\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportController extends Controller
{
    public function expiringActivity(Request $request)
    {
        $sort_order = 'asc';

        if (!empty($request->sort_order)) {
            $sort_order = $request->sort_order;
        }

        if ($sort_order == 'asc') {
            $next_order = 'desc';
        } else {
            $next_order = 'asc';
        }

        $data['next_order'] = $next_order;

        $orderBy = 'expiration_date';

        if (!empty($request->order_by)) {
            $orderBy = $request->order_by;
        }

        $expire_in_date = today()->addDays(15);

        $projects = Project::where('status_id', 5)->whereDate('expiration_date', '>=', today())
            ->whereDate('expiration_date', '<', $expire_in_date)
            ->orderBy($orderBy, $sort_order)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.expiring-activity-report', $data);
    }

    public function expiringActivityPdf()
    {
        $expire_in_date = today()->addDays(15);

        $projects = Project::where('status_id', 5)->whereDate('expiration_date', '>=', today())
            ->whereDate('expiration_date', '<', $expire_in_date)
            ->orderBy('expiration_date', 'asc')
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.expiring-activity-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('Expiring-Activities.pdf');
    }

    public function expiringActivityCsv()
    {
        $file_name = 'Expiring-Activities-'.now();
        return Excel::download(new ExpiringActivityExport(), $file_name.'.csv');
    }

    public function expiringActivityExcel()
    {
        $file_name = 'Expiring-Activities-'.now();
        return Excel::download(new ExpiringActivityExport(), $file_name.'.xls');
    }

    public function expiredActivity(Request $request)
    {
        $sort_order = 'asc';

        if (!empty($request->sort_order)) {
            $sort_order = $request->sort_order;
        }

        if ($sort_order == 'asc') {
            $next_order = 'desc';
        } else {
            $next_order = 'asc';
        }

        $data['next_order'] = $next_order;

        $orderBy = 'expiration_date';

        if (!empty($request->order_by)) {
            $orderBy = $request->order_by;
        }

        $projects = Project::where('status_id', 6)->whereDate('expiration_date', '<', today())
            ->orderBy($orderBy, $sort_order)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.expired-activity-report', $data);
    }

    public function expiredActivityPdf()
    {

        $projects = Project::where('status_id', 6)->whereDate('expiration_date', '<', today())
            ->orderBy('expiration_date', 'desc')
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.expired-activity-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('Expiring-Activities.pdf');
    }

    public function expiredActivityCsv()
    {
        $file_name = 'Expired-Activities-'.now();
        return Excel::download(new ExpiredActivityExport(), $file_name.'.csv');
    }

    public function expiredActivityExcel()
    {
        $file_name = 'Expired-Activities-'.now();
        return Excel::download(new ExpiredActivityExport(), $file_name.'.xls');
    }

    public function accreditation()
    {

        $projects = Project::where('status_id', 3)
            ->where('has_commercial_support', 'Yes')
            ->where('has_loa', 1)
            ->orderBy('expiration_date', 'desc')
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.accreditation-report', $data);
    }

    public function accreditationPdf()
    {

        $projects = Project::where('status_id', 3)
            ->where('has_commercial_support', 'Yes')
            ->where('has_loa', 1)
            ->orderBy('expiration_date', 'desc')
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.accreditation-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('Accreditation.pdf');
    }

    public function accreditationCsv()
    {
        return Excel::download(new AccreditationExport(), 'Accreditation.csv');
    }

     public function accreditationExcel()
    {
        return Excel::download(new AccreditationExport(), 'Accreditation.xls');
    }
}
