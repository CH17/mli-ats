<?php

namespace App\Observers;

use App\Project;
use Auth;

class ProjectObserver
{   

    

    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function created(Project $project)
    {   
        
        
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {           

        $changes=$this->getChanges($project);

        $this->recordActivity($project,$changes);
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
    /**
     * Function recordActivity
     * 
     * Parameters $project,$changes
     */
    public function recordActivity($project,$changes){
        \App\Activity::create([
            'user_id'       => Auth::user()->id,
            'project_id'    => $project->id,
           // 'message'       => $this->request->message,
            'changes'       => serialize($changes),
        ]);
    }
    /**
     * Function getChanges
     * 
     * Parameters $project
     */
    public function getChanges($project)
    {
        $changes = array();

        foreach($project->getDirty() as $key => $value){
            $original = $project->getOriginal($key);
            $changes[$key] = [
                'before' => $original,
                'after' => $value,
            ];
        }
        return $changes;

    }
    
}
