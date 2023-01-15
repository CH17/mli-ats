<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use App\Users\UserLists;

class ProjectAssignedController extends Controller
{   

   
    public function edit($id)
    {
        $project = Project::find($id);        
        
        $data['project'] = $project;

        $user_lists = new UserLists();

        $data['user_array'] = $user_lists->userArray();

        return view('backend/project/template/assign-users', $data);

    }

    public function update(Project $project,Request $request){

        
        $project->assigned($request,$project);         
        
        return redirect()->back()->with('assigned_success', 'The project user has been updated.');   
    }
}
