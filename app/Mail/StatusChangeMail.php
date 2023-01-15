<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusChangeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $project;
    public $project_status;

    public function __construct($project, $project_status)
    {
        $this->project = $project;
        $this->project_status = $project_status;
    }


    public function build()
    {
        if ($this->project_status == "New") {
            $subject =  'New Activity in your Queue';
        }elseif ($this->project_status == "Planning") {
            $subject =  'Activity Accepted - ' . $this->project->activity_id;
        }else{
            $subject =  $this->project->activity_id . ' has changed to '.$this->project_status;
        }

        return $this->markdown('email.status-change')->subject($subject)->with([
            'status' => $this->project_status,
        ]);
    }
}
