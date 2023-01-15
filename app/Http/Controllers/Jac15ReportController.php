<?php

namespace App\Http\Controllers;

use App\Exports\Jac15Export;
use App\Jac15;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class Jac15ReportController extends Controller
{
    public function index()
    {
        $jac15Reports = Jac15::orderBy('year_quarter', 'asc')->orderBy('add_date', 'desc')->paginate(15);

        $data['jac15Reports'] = $jac15Reports;

        return view('backend.report.jac15-report', $data);
    }

    public function pdfDownload()
    {
        $jac15Reports = Jac15::orderBy('year_quarter', 'asc')->orderBy('add_date', 'desc')->get();

        $data['jac15Reports'] = $jac15Reports;

        $pdf = PDF::loadView('backend.report.template.jac15-table', $data)->setPaper('Legal', 'landscape')->setWarnings(false);

        return $pdf->stream('JAC-15.pdf');
    }

    public function csvDownload()
    {
        return Excel::download(new Jac15Export(), 'JAC-15.csv');
    }

    public function excelDownload()
    {
        return Excel::download(new Jac15Export(), 'JAC-15.xls');
    }
}
