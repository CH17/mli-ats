<?php

namespace App\Http\Controllers;

use App\WeeklyJacReport;
use Illuminate\Http\Request;

class JacReportController extends Controller
{
    public function index()
    {
        $jac_reports = WeeklyJacReport::orderBy('id', 'desc')->paginate(15);

        $data['jac_reports'] = $jac_reports;

        $jac_report = WeeklyJacReport::orderBy('week', 'desc')->first();  

        $data['jac_report'] = $jac_report;        

        return view('backend.jac-report.index', $data);
    }
}
