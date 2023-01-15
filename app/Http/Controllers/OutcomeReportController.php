<?php

namespace App\Http\Controllers;

use App\Formatter\OutcomeFormatter;
use App\Project;
use Illuminate\Http\Request;
use App\Imports\OutcomeImport;
use App\Outcome;
use Maatwebsite\Excel\Facades\Excel;
use View;

class OutcomeReportController extends Controller
{
    public function report(Request $request)
    {

        $projects = Project::pluck('activity_id', 'id');

        $data['projects'] = $projects;

        return view('backend/outcome/report', $data);
    }

    public function getActivity(Request $request)
    {

        $project_id = $request->project_id;

        $data['project_id'] = $project_id;

        $project = Project::find($project_id);

        $data['project'] = $project;

        $outcomes = Outcome::where('project_id', $project_id)->select('batch', 'updated_at')->distinct()->get();

        $data['outcomes'] = $outcomes;

        if (!empty($project)) {

            $activity_view = View::make('backend/outcome/template/activity-details', $data)->render();

            $import_csv = View::make('backend/outcome/template/import-csv', $data)->render();

            return \Response::json(array(
                'success' => true,
                'activity_view' => $activity_view,
                'import_csv' => $import_csv
            ));
        }
    }

    public function import(Request $request)
    {
        $batch_status = $request->batch_status;

        $project_id = $request->project_id;

        if ($request->hasFile('csv_file') && !empty($project_id)) {
            $file = $request->file('csv_file');

            $name = time() . '.' . $file->getClientOriginalExtension();

            $destinationPath = storage_path('app/public/file/outcome_csv/');

            $file->move($destinationPath, $name);

            $file_name = storage_path('app/public/file/outcome_csv/') . $name;

            $collection = Excel::toArray(new OutcomeImport, $file_name);

            $outcome = Outcome::where('project_id', $project_id)->orderBy('updated_at', 'asc')->get();

            if (!empty($outcome->last()->batch) && !empty($batch_status) && $batch_status == 'merge') {
                $batch = $outcome->last()->batch + 1;
                foreach ($collection[0] as $item) {
                    $outcome_data = new OutcomeFormatter();
                    $data = $outcome_data->format($item, $project_id);
                    $data['batch'] = $batch;
                    Outcome::create($data);
                }
            } else {
                $outcome = Outcome::where('project_id', $project_id);
                $outcome->delete();
                foreach ($collection[0] as $item) {
                    $outcome_data = new OutcomeFormatter();
                    $data = $outcome_data->format($item, $project_id);
                    $data['batch'] = 1;
                    Outcome::create($data);
                }
            }

            return back()->with('success', 'EM Analysis imported successfully!');
        }
    }

    public function show(Outcome $outcome)
    {
        $data['outcome'] = $outcome;

        return view('backend/outcome/outcome-table', $data);
    }

    public function index(Request $request)
    {
        $projects = Project::pluck('activity_id', 'id');

        $data['projects'] = $projects;

        $project_id = $request->project_id;

        $data['project_id'] = $project_id;

        $project = Project::find($project_id);

        $data['project'] = $project;

        $outcomes = Outcome::where('project_id', $project_id)->paginate(15);

        $data['outcomes'] = $outcomes;

        return view('backend/outcome/index', $data);
    }

    public function edit(Outcome $outcome)
    {
        $data['outcome'] = $outcome; 

        return view('backend/outcome/edit', $data);
    }

    public function update(Request $request, Outcome $outcome)
    {
        $outcome->update($request->all());

        return redirect()->back()->with('success', 'Outcome updated successfully!');
    }
}
