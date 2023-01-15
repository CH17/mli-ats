<?php

namespace App\Http\Controllers;

use App\Exports\Jac17Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac17ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac17', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac17-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac17', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac17-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-17.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac17Export(), 'JAC-17.csv');
    }

     public function excelDownload()
    {
        return Excel::download(new Jac17Export(), 'JAC-17.xls');
    }
}
