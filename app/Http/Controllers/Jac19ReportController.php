<?php

namespace App\Http\Controllers;

use App\Exports\Jac19Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac19ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac19', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac19-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac19', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac19-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-19.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac19Export(), 'JAC-19.csv');
    }

    public function excelDownload()
    {
        return Excel::download(new Jac19Export(), 'JAC-19.xls');
    }
}
