<?php

namespace App\Http\Controllers;

use App\Exports\Jac14Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac18ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac18', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac18-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac18', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac18-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-18.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac14Export(), 'JAC-18.csv');
    }

    public function excelDownload()
    {
        return Excel::download(new Jac14Export(), 'JAC-18.xls');
    }
}
