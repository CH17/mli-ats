<?php

namespace App\Http\Controllers;

use App\Exports\Jac24Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac24ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac24', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac24-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac24', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac24-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-24.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac24Export(), 'JAC-24.csv');
    }

    public function excelDownload()
    {
        return Excel::download(new Jac24Export(), 'JAC-24.xls');
    }
}
