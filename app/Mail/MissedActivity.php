<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MissedActivity extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $project;

    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $managedby = '';
       if (!empty($this->project->managedby)) {
           $managedby = $this->project->managedby->initials;
       }
        $subject =  "Release Date Missed for ".$managedby." – ".Date('Y-m-d');
        
        return $this->markdown('email.miss-released')->subject($subject);
    }
}
