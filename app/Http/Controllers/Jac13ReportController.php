<?php

namespace App\Http\Controllers;

use App\Exports\Jac13Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac13ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac13', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac13-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac13', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac13-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-13.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac13Export(), 'JAC-13.csv');
    }

     public function excelDownload()
    {
        return Excel::download(new Jac13Export(), 'JAC-13.xls');
    }
}
