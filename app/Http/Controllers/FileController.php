<?php

namespace App\Http\Controllers;

use App\File;
use App\Project;
use Notification;
use App\Mail\Attachment;
use Illuminate\Http\Request;
use App\Jobs\SendAttachmentEmail;
use App\FileUploader\FileUploader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ProjectMessage;

class FileController extends Controller
{
    public function store(Project $project, Request $request)
    {
        $files = $request->file('attachments');

        $file_type = array_key_first($files);
        $data = [];

        if ($file_type != null) {

            $file = $files[$file_type];
            $status = 'not-reviewed';
            $fileUploader = new FileUploader();
            $uploadedFile = $fileUploader->uploadFile($file);

            $newFile = new File;
            $newFile->file = $uploadedFile;
            $newFile->status = $status;
            $newFile->type = $file_type;

            $project->files()->save($newFile);

            if ($request->has('update')) {
                $project->{$request->update} = 1;
                $project->save();
            }

            $users = $project->notifyableusers();

            foreach($users as $user){
                
                dispatch(new SendAttachmentEmail($project, $file_type, $status, $user->email));
            }           
        }

        return response()->json(['data' => $users, 'success' => true]);
    }

    public function destroy(File $file)
    {

        $file->delete();
        return redirect()->back();
    }

    public function update(Project $project, Request $request)
    {
        $file = File::where('id', $request->file_no)->first();

        if ($file) {
            $file->status = $request->status;
            $file->comment = $request->comment;
            $file->save();

             if ($request->has('update')) {
                $this->updateAttachmentFlag($project, $request->status, $request->update);
            }


            $users = $project->notifyableusers();

            Notification::send($users, 
                new ProjectMessage($project->activity_id, $project->id, $project->activity_id . ': ' . Auth::user()->name . ' Changed '.$file->type. ' status to '.$request->status));

            foreach($users as $user){
                
                dispatch(new SendAttachmentEmail($project, $file->type, $request->status, $user->email));
            } 


            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function updateAttachmentFlag($project, $status, $update) {

        if($status == 'need-modification'){
            $has_attachment_flag = 2;
        }elseif($status == 'confirmed'){
            $has_attachment_flag = 3;
        }else{
            $has_attachment_flag = 1;
        }

        switch ($update) {
            case 'attachment-1':
                $has_field = 'has_attachment_1';
                break;
             case 'attachment-2a':
                $has_field = 'has_attachment_2a';
                break;
            case 'attachment-2b':
                $has_field = 'has_attachment_2b';
                break;
            case 'attachment-3':
                $has_field = 'has_attachment_3';
                break;
            case 'attachment-4':
                $has_field = 'has_attachment_4';
                break;
            case 'attachment-5':
                $has_field = 'has_attachment_5';
                break;
            case 'attachment-6':
                $has_field = 'has_attachment_6';
                break;
            case 'attachment-7':
                $has_field = 'has_attachment_7';
                break;
            case 'attachment-8':
                $has_field = 'has_attachment_8';
                break;
            default:
                $has_field = '';
                break;
        }

        if (!empty($has_field)) {
            $project->{$has_field} = $has_attachment_flag;
            $project->save();
        }
    }
}
