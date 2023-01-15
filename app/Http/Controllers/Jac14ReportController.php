<?php

namespace App\Http\Controllers;

use App\Exports\Jac14Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac14ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac14', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac14-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac14', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac14-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-14.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac14Export(), 'JAC-14.csv');
    }

     public function excelDownload()
    {
        return Excel::download(new Jac14Export(), 'JAC-14.xls');
    }
}
