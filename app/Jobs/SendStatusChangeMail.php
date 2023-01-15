<?php

namespace App\Jobs;

use App\Mail\StatusChangeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendStatusChangeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $project;
    public $recipient;
    public $project_status;
    public $moreUsers;

    public function __construct($project, $recipient, $project_status, $moreUsers)
    {
        $this->project = $project;
        $this->recipient = $recipient;
        $this->project_status = $project_status;
        $this->moreUsers = $moreUsers;
    }

    public function handle()
    {
        if (!empty($this->moreUsers)) {
            Mail::to($this->recipient)
                ->cc($this->moreUsers)
                ->send(new StatusChangeMail($this->project, $this->project_status));        
        }

        if (empty($this->moreUsers)) {
            Mail::to($this->recipient)
                ->send(new StatusChangeMail($this->project, $this->project_status));
        }
    }
}
