<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use App\User;
use App\Notifications\ProjectMessage;
use Notification;

class ProjectApproveController extends Controller
{
    /*#####################################################
    #------------------------------------------------------
    # Function approve
    #-------------------------------------------------------
    #
    # @_SM: 
    # Parameters : project_id
    #
    #
    #
    #####################################################*/

    public function approve(Project $project)
    {

        $project->approve();

        // $users = User::whereHas('roles', function ($q) {
        //     $q->whereIn('name', ['ED', 'ADMIN']);
        // })->get();

        // Notification::send($users, new ProjectMessage($project->activity_id, $project->id, $project->activity_id . ': Project status has changed to "Approved".'));

        return redirect()->back()->with('success', 'The project has been approved.');
    }

    /*#####################################################
    #------------------------------------------------------
    # Function approve
    #-------------------------------------------------------
    #
    # @_SM: 
    # Parameters : project_id
    #
    #
    #
    #####################################################*/

    public function cancel(Project $project)
    {
        $project->cancel();
        return redirect()->back()->with('success', 'The project has been canceled.');
    }


    /*#####################################################
    #------------------------------------------------------
    # Function approve
    #-------------------------------------------------------
    #
    # @_SM: 
    # Parameters : project_id
    #
    #
    #
    #####################################################*/

    public function complete(Project $project)
    {
        $project->complete();
        return redirect()->back()->with('success', 'The project has been completed.');
    }
}
