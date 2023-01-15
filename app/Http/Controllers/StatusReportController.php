<?php

namespace App\Http\Controllers;

use App\WeeklyStatusReport;
use Illuminate\Http\Request;

class StatusReportController extends Controller
{
    public function index()
    {
        $status_reports = WeeklyStatusReport::orderBy('id', 'desc')->paginate(15);

        $data['status_reports'] = $status_reports;
        
        return view('backend.status-report.index', $data);
    }
}
