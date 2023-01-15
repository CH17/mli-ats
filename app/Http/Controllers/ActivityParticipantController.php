<?php

namespace App\Http\Controllers;

use App\Formatter\ActivityParticipantFormatter;
use App\Project;
use Illuminate\Http\Request;
use App\Imports\ActivityParticipantImport;
use App\ActivityParticipant;
use Maatwebsite\Excel\Facades\Excel;
use View;

class ActivityParticipantController extends Controller
{
    public function index(Request $request)
    { 

        $projects = Project::pluck('activity_id', 'id');

        $data['projects'] = $projects;

        return view('backend/activity-participant/index', $data);
    }

    public function getActivity(Request $request)
    {

        $project_id = $request->project_id;

        $data['project_id'] = $project_id;

        $project = Project::find($project_id);

        $data['project'] = $project;

        $activity_participants = ActivityParticipant::where('project_id', $project_id)->select('batch', 'updated_at')->distinct()->get();

        $data['activity_participants'] = $activity_participants;

        if (!empty($project)) {

            $activity_view = View::make('backend/activity-participant/template/activity-details', $data)->render();

            $import_csv = View::make('backend/activity-participant/template/import-csv', $data)->render();

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

            $destinationPath = storage_path('app/public/file/activity_participant_csv/');

            $file->move($destinationPath, $name);

            $file_name = storage_path('app/public/file/activity_participant_csv/') . $name;

            $collection = Excel::toArray(new ActivityParticipantImport, $file_name);

            $activity_participant = ActivityParticipant::where('project_id', $project_id)->orderBy('updated_at', 'asc')->get();

            if (!empty($activity_participant->last()->batch) && !empty($batch_status) && $batch_status == 'merge') {
                $batch = $activity_participant->last()->batch + 1;
                foreach ($collection[0] as $item) {
                    $activity_participant_data = new ActivityParticipantFormatter();
                    $data = $activity_participant_data->format($item, $project_id);
                    $data['batch'] = $batch;
                    ActivityParticipant::create($data);
                }
            } else {
                $activity_participant = ActivityParticipant::where('project_id', $project_id);
                $activity_participant->delete();
                foreach ($collection[0] as $item) {
                    $activity_participant_data = new ActivityParticipantFormatter();
                    $data = $activity_participant_data->format($item, $project_id);
                    $data['batch'] = 1;                
                    ActivityParticipant::create($data);
                }
            }

            return back()->with('success', 'Activity Participant imported successfully!');
        }
    }
}
