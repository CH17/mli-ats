<?php

namespace App\Jobs;

use App\Mail\Assignment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAssignmentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $project;
    public $subject;
    public $recipient;

    public function __construct($project, $subject, $recipient)
    {
        $this->project = $project;
        $this->subject = $subject;
        $this->recipient = $recipient;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         Mail::to($this->recipient)->send(new Assignment($this->project, $this->subject ));
    }
}
