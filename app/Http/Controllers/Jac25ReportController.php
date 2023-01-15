<?php

namespace App\Http\Controllers;

use App\Exports\Jac25Export;
use App\Project;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac25ReportController extends Controller
{
    public function index()
    {
        $projects = Project::where('jac25', 1)
            ->paginate(15);

        $data['projects'] = $projects;

        return view('backend.report.jac25-report', $data);
    }

    public function pdfDownload()
    {
        $projects = Project::where('jac25', 1)
            ->get();

        $data['projects'] = $projects;

        $pdf = PDF::loadView('backend.report.template.jac25-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-25.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac25Export(), 'JAC-25.csv');
    }

    public function excelDownload()
    {
        return Excel::download(new Jac25Export(), 'JAC-25.xls');
    }
}
