<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use Notification;
use App\ProjectMeta;
use App\ProjectStatus;
use App\Users\UserLists;
use Illuminate\Http\Request;
use App\Formatter\ProjectFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProjectMessage;

class ProjectResourceController extends Controller
{
  public function editEvidence($id)
  {

    $project = Project::where('id', $id)->with('audience_types')->firstOrFail();

    $next_status = '';

    if (!empty($project->project_status) && $project->project_status->id != 9) {
      $next_status_id = $project->project_status->id + 1;

      $next_status = ProjectStatus::where('id', $next_status_id)->first();
    }
    $data['next_status'] = $next_status;

    $project_status = ProjectStatus::pluck('name', 'id');

    $data['project_status'] = $project_status;

    $criteria_list = config('constants.criteria');

    $data['criteria_list'] = $criteria_list;

    $data['user_role'] = Auth::user()->role();

    if (Auth::user()->role() != 'ADMIN' && Auth::user()->role() != 'ED' && !$project->has_user(Auth::user())) {
      abort(404);
    }

    $data['project'] = $project;
    $user_lists = new UserLists();
    $data['user_array'] = $user_lists->userArray();

    $data['attachments'] = $project->files->groupBy('type');

    return view('backend/project/edit-project-evidence', $data);
  }

  public function review($id)
  {

    $project = Project::where('id', $id)->with('audience_types')->firstOrFail();

    $next_status = '';

    if (!empty($project->project_status) && $project->project_status->id != 9) {
      $next_status_id = $project->project_status->id + 1;

      $next_status = ProjectStatus::where('id', $next_status_id)->first();
    }
    $data['next_status'] = $next_status;

    $project_status = ProjectStatus::pluck('name', 'id');

    $data['project_status'] = $project_status;

    $criteria_list = config('constants.criteria');

    $data['criteria_list'] = $criteria_list;

    $data['user_role'] = Auth::user()->role();

    if (Auth::user()->role() != 'ADMIN' && Auth::user()->role() != 'ED' && !$project->has_user(Auth::user())) {
      abort(404);
    }

    $data['project'] = $project;
    $user_lists = new UserLists();
    $data['user_array'] = $user_lists->userArray();

    $data['attachments'] = $project->files->groupBy('type');

    return view('backend/project/edit-project-review', $data);
  }



  public function editDisclosures($id)
  {

    $project = Project::where('id', $id)->with('audience_types')->firstOrFail();

    $next_status = '';

    if (!empty($project->project_status) && $project->project_status->id != 9) {
      $next_status_id = $project->project_status->id + 1;

      $next_status = ProjectStatus::where('id', $next_status_id)->first();
    }
    $data['next_status'] = $next_status;

    $project_status = ProjectStatus::pluck('name', 'id');

    $data['project_status'] = $project_status;

    $criteria_list = config('constants.criteria');

    $data['criteria_list'] = $criteria_list;

    $data['user_role'] = Auth::user()->role();

    if (Auth::user()->role() != 'ADMIN' && Auth::user()->role() != 'ED' && !$project->has_user(Auth::user())) {
      abort(404);
    }

    $data['project'] = $project;
    $user_lists = new UserLists();
    $data['user_array'] = $user_lists->userArray();

    $data['attachments'] = $project->files->groupBy('type');

    return view('backend/project/edit-project-disclosures', $data);
  }

  public function storeDisclosures($id, Request $request)
  {

    $project = Project::find($id);
    $project_data = new ProjectFormatter();

    $data = $project_data->disclosuresFormat($request, $project);

    //  $project->update($data['project_info']);

    $project_meta = $project->meta ?: new ProjectMeta();
    foreach ($data['project_meta'] as $key => $data) {
      $project_meta->$key = $data;
    }

    $project->meta()->save($project_meta);


    // if (count($project->getChanges())) {
    //   $users = $project->notifyableusers();

    //   Notification::send($users, new ProjectMessage($project->activity_id, $project->id, $project->activity_id . ': ' . Auth::user()->name . ' made JAC changes.'));
    // }

    return response()->json(['success' => true, 'data' => $project_meta]);
  }


  public function editCommercialSupport($id)
  {

    $project = Project::where('id', $id)->with('audience_types')->firstOrFail();

    $next_status = '';

    if (!empty($project->project_status) && $project->project_status->id != 9) {
      $next_status_id = $project->project_status->id + 1;

      $next_status = ProjectStatus::where('id', $next_status_id)->first();
    }
    $data['next_status'] = $next_status;

    $project_status = ProjectStatus::pluck('name', 'id');

    $data['project_status'] = $project_status;

    $criteria_list = config('constants.criteria');

    $data['criteria_list'] = $criteria_list;

    $data['user_role'] = Auth::user()->role();

    if (Auth::user()->role() != 'ADMIN' && Auth::user()->role() != 'ED' && !$project->has_user(Auth::user())) {
      abort(404);
    }

    $data['project'] = $project;
    $user_lists = new UserLists();
    $data['user_array'] = $user_lists->userArray();
    $data['attachments'] = $project->files->groupBy('type');

    return view('backend/project/edit-project-com-support', $data);
  }

  public function storeCommercialSupport($id, Request $request)
  {

    $project = Project::find($id);
    $project_data = new ProjectFormatter();

    $data = $project_data->supportFormat($request);

    $project->update($data['project_info']);

    $project_meta = $project->meta ?: new ProjectMeta();    

    foreach ($data['project_meta'] as $key => $data) {
        $project_meta->$key = $data;
    }

    $project->meta()->save($project_meta);    
 
    return response()->json(['success' => true]);

  }


  public function editJac($id)
  {

    $project = Project::where('id', $id)->with('audience_types')->firstOrFail();

    $next_status = '';

    if (!empty($project->project_status) && $project->project_status->id != 9) {
      $next_status_id = $project->project_status->id + 1;

      $next_status = ProjectStatus::where('id', $next_status_id)->first();
    }
    $data['next_status'] = $next_status;

    $project_status = ProjectStatus::pluck('name', 'id');

    $data['project_status'] = $project_status;

    $criteria_list = config('constants.criteria');

    $data['criteria_list'] = $criteria_list;

    $data['user_role'] = Auth::user()->role();

    if (Auth::user()->role() != 'ADMIN' && Auth::user()->role() != 'ED' && !$project->has_user(Auth::user())) {
      abort(404);
    }

    $data['project'] = $project;
    $user_lists = new UserLists();
    $data['user_array'] = $user_lists->userArray();

    return view('backend/project/edit-project-jac', $data);
  }

  public function storeJac($id, Request $request)
  {

    $project = Project::find($id);
    $project_data = new ProjectFormatter();

    $data = $project_data->jacFormat($request);

    $project->update($data['project_info']);

    $project_meta = $project->meta ?: new ProjectMeta();
    foreach ($data['project_meta'] as $key => $data) {
      $project_meta->$key = $data;
    }

    $project->meta()->save($project_meta);


    if (count($project->getChanges())) {
      $users = $project->notifyableusers();

      Notification::send($users, new ProjectMessage($project->activity_id, $project->id, $project->activity_id . ': ' . Auth::user()->name . ' made JAC changes.'));
    }

    return response()->json(['success' => true, 'data' => $project_meta]);
  }
}
