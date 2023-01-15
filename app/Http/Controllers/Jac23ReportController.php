<?php

namespace App\Http\Controllers;

use App\Exports\Jac23Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac23ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac23', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac23-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac23', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac23-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-23.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac23Export(), 'JAC-23.csv');
    }

     public function excelDownload()
    {
        return Excel::download(new Jac23Export(), 'JAC-23.xls');
    }
}
