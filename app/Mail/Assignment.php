<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Assignment extends Mailable
{
    use Queueable, SerializesModels;

    public $project;
    public $subject;

    public function __construct($project, $subject)
    {
        $this->project = $project;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->markdown('email.assign-activity')->subject($this->subject);
    }
}
