<?php

namespace App\Http\Controllers;

use App\Jobs\SendStatusChangeMail;
use Illuminate\Http\Request;
use App\Project;
use Notification;
use App\Notifications\ProjectMessage;
use App\ProjectStatus;
use App\User;
use Auth;
use Illuminate\Support\Facades\Log;

class ProjectStatusController extends Controller
{

    public function update(Project $project, Request $request)
    {

        $project_status = ProjectStatus::find($request->status);

        $project->setStatus($request->status);

        if (count($project->getChanges())) {

            // $users = User::whereIn('id', [$project->managed_by, $project->assigned_to, $project->used_by])
            //     ->orWhereHas('roles', function ($q) {
            //         $q->whereIn('name', ['ED', 'ADMIN', 'DoA']);
            //     })->get();

            // Notification::send($users, new ProjectMessage($project->activity_id, $project->id, $project->activity_id . ': Project status has changed to "' . $project_status->name . '".'));

            // Notification::send($project, new ProjectMessage($project->activity_id, $project->id, Auth::user()->name . ' has changed Project status to "' . $project_status->name . '".'));

            //  $users = [];

            $users = User::whereIn('id', [$project->managed_by, $project->assigned_to, $project->used_by])
                ->orWhereHas('roles', function ($q) {
                    $q->whereIn('name', ['ED', 'DoA']);
                })->get();

            $moreUsers = User::whereHas('roles', function ($q) {
                $q->where('name', 'ADMIN');
            })->get()->pluck('email');

            foreach ($users as $user) {
                dispatch(new SendStatusChangeMail($project, $user->email, $project_status->name, $moreUsers));
            }
        }

        
        return response()->json([
            'success' => true,
            'message' => 'Project status has changed to ' . $project_status->name
        ]);
    }
}
