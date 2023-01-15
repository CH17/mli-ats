<?php

namespace App\Mail;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Attachment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $project;
     public $file_type;
     public $status;



    public function __construct($project, $file_type, $status)
    {
        $this->project = $project;
        $this->file_type = $file_type;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = $this->project->activity_id .': '.Str::ucfirst($this->file_type).' Status';
        $message = '';
        
        if($this->status == 'not-reviewed'){
            $message = Str::ucfirst($this->file_type).' file has been uploaded on '.$this->project->activity_id;           
        }
        
        if($this->status == 'need-modification'){
            $message = Str::ucfirst($this->file_type).' file was reviewed and it will need modification. Please check reviewer comment on Edit page.';           
        }

        if($this->status == 'confirmed'){
            $message = Str::ucfirst($this->file_type).' file is reviewed and confirmed.';           
        }


        return $this->markdown('email.attachment-status')->subject($subject)->with([
            'message' =>$message
        ]);
    }
}
