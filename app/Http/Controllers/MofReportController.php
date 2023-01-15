<?php

namespace App\Http\Controllers;

use App\Project;
use App\WeeklyMofReport;
use Illuminate\Http\Request;

class MofReportController extends Controller
{
    public function index()
    {

        $mof_reports = WeeklyMofReport::orderBy('id', 'desc')->paginate(15);

        $data['mof_reports'] = $mof_reports;

        return view('backend.mof-report.index', $data);
    }

    public function edit($id)
    {
        $mof_report = WeeklyMofReport::findOrFail($id);

        $data['mof_report'] = $mof_report;
        return view('backend.mof-report.edit', $data);
    }


    public function update(Request $request, $id)
    {      

        $data['one_pager_produced'] = $request->one_pager_produced;
        $data['one_pager_in_route'] = $request->one_pager_in_route;
        $data['mof_uploaded'] = $request->mof_uploaded;
        $data['participation_uploaded'] = $request->participation_uploaded;

        $mof_report = WeeklyMofReport::findOrFail($id);

        $mof_report->update($data);

        return redirect()->back()->with('success', 'Weekly MOF Report updated successfully!');
    }
}
