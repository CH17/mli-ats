<?php

namespace App\Jobs;

use App\Mail\Attachment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendAttachmentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public $recipient;
    public $project;
    public $file_type;
    public $status;

    public function __construct($project, $file_type, $status, $recipient)
    {
        $this->project = $project;
        $this->recipient = $recipient;
        $this->file_type = $file_type;
        $this->status = $status;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->recipient)->send(new Attachment($this->project, $this->file_type, $this->status ));
    }
}
