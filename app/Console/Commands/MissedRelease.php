<?php

namespace App\Console\Commands;

use App\Project;
use App\Mail\MissedActivity;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MissedRelease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:missed-activities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily emails for missed activities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $q = Project::with(['managedby', 'project_status']);

        $q->where(function ($query) {
                $query->where('status_id', 3)->orWhere('status_id', 4);
            });

        $q->where('is_ats_form_ready', '!=', 2);

        $last_day = Date('Y-m-d', strtotime('-1 days'));
        $q->whereDate('start_date', '=', $last_day);

        $projects = $q->get();      

        foreach($projects as $project){

            $managedby = '';
            if (!empty($project->managedby)) {
                $managedby = $project->managedby->initials;
            }
            
            $users = $project->notifyableusers();

            foreach($users as $user){
                 Mail::to($user->email)->send(new MissedActivity($project));
            }
           
        }
    }
}
