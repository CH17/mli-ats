<?php

namespace App\FileUploader;

use App\FileUploader\FileUploader;
use Illuminate\Support\Facades\Log;

class ProjectFileUploader
{

    function uploadFiles($data, $project_code)
    {
        $dis_attachments = $data->file('dis_attachments');

        $uploadedFiles_1 = $data->file('Attachment_1');
        $uploadedFiles_2 = $data->file('Attachment_2');
        $uploadedFiles_3 = $data->file('Attachment_3');
        $uploadedFiles_4 = $data->file('Attachment_4');
        $uploadedFiles_5 = $data->file('Attachment_5');
        $uploadedFiles_6 = $data->file('Attachment_6');
        $uploadedFiles_7 = $data->file('Attachment_7');
        $uploadedFiles_8 = $data->file('Attachment_8');

        // $supportAttachment_8 = $data->file('Attachment_8');
        //$supportAttachment_9 = $data->file('Attachment_9');


        $files = array();

        if (!empty($dis_attachments)) {
            foreach ($dis_attachments as $dis_attachment) {
                $fileUploader = new FileUploader();
                $uploadedFile[] = $fileUploader->uploadDisDocuments($dis_attachment, $project_code);
            }
            $files['dis_attachments'] = $uploadedFile;
        }

        if (!empty($uploadedFiles_1)) {
            foreach ($uploadedFiles_1 as $uploadedFile_1) {
                $fileUploader = new FileUploader();
                $uploadedFile_1 = $fileUploader->uploadFile($uploadedFile_1, $project_code);
                $value1[] = $uploadedFile_1;
            }
            $files['attachment'][1]['files'] = $value1;
        }
        if (!empty($uploadedFiles_2)) {
            foreach ($uploadedFiles_2 as $uploadedFile_2) {
                $fileUploader = new FileUploader();
                $uploadedFile_2 = $fileUploader->uploadFile($uploadedFile_2, $project_code);
                $value2[] = $uploadedFile_2;
            }
            $files['attachment'][2]['files'] = $value2;
        }

        if (!empty($uploadedFiles_3)) {
            foreach ($uploadedFiles_3 as $uploadedFile_3) {
                $fileUploader = new FileUploader();
                $uploadedFile_3 = $fileUploader->uploadFile($uploadedFile_3, $project_code);
                $value3[] = $uploadedFile_3;
            }
            $files['attachment'][3]['files'] = $value3;
        }

        if (!empty($uploadedFiles_4)) {
            foreach ($uploadedFiles_4 as $uploadedFile_4) {
                $fileUploader = new FileUploader();
                $uploadedFile_4 = $fileUploader->uploadFile($uploadedFile_4, $project_code);
                $value4[] = $uploadedFile_4;
            }
            $files['attachment'][4]['files'] = $value4;
        }

        if (!empty($uploadedFiles_5)) {
            foreach ($uploadedFiles_5 as $uploadedFile_5) {
                $fileUploader = new FileUploader();
                $uploadedFile_5 = $fileUploader->uploadFile($uploadedFile_5, $project_code);
                $value5[] = $uploadedFile_5;
            }
            $files['attachment'][5]['files'] = $value5;
        }

        if (!empty($uploadedFiles_6)) {
            foreach ($uploadedFiles_6 as $uploadedFile_6) {
                $fileUploader = new FileUploader();
                $uploadedFile_6 = $fileUploader->uploadFile($uploadedFile_6, $project_code);
                $value6[] = $uploadedFile_6;
            }
            $files['attachment'][6]['files'] = $value6;
        }

        if (!empty($uploadedFiles_7)) {
            foreach ($uploadedFiles_7 as $uploadedFile_7) {
                $fileUploader = new FileUploader();
                $uploadedFile_7 = $fileUploader->uploadFile($uploadedFile_7, $project_code);
                $value7[] = $uploadedFile_7;
            }
            $files['attachment'][7]['files'] = $value7;
        }

        if (!empty($uploadedFiles_8)) {
            foreach ($uploadedFiles_8 as $uploadedFile_8) {
                $fileUploader = new FileUploader();
                $uploadedFile_8 = $fileUploader->uploadFile($uploadedFile_8, $project_code);
                $value8[] = $uploadedFile_8;
            }
            $files['attachment'][8]['files'] = $value8;
        }

        // if (!empty($supportAttachment_8)) {
        //     foreach ($supportAttachment_8 as $uploadedFile_8) {
        //         $fileUploader = new FileUploader();
        //         $uploadedFile_8 = $fileUploader->uploadFile($uploadedFile_8, $project_code);
        //         $value8[] = $uploadedFile_8;
        //     }
        //     $files['support_attachment'][8] = json_encode($value8);
        // }

        // if (!empty($supportAttachment_9)) {
        //     foreach ($supportAttachment_9 as $uploadedFile_9) {
        //         $fileUploader = new FileUploader();
        //         $uploadedFile_9 = $fileUploader->uploadFile($uploadedFile_9, $project_code);
        //         $value9[] = $uploadedFile_9;
        //     }
        //     $files['support_attachment'][9] = json_encode($value9);
        // }

        return $files;
    }

    public function uploadRelatedDocuments($data, $project_code)
    {
        $uploadedFiles = $data->file('related_documents');

        $files = array();

        if (!empty($uploadedFiles)) {
            foreach ($uploadedFiles as $uploadedFile) {
                $fileUploader = new FileUploader();
                $uploadedFile = $fileUploader->uploadRelatedDocuments($uploadedFile, $project_code);
                $value[] = $uploadedFile;
            }
            $files['related_documents'] = $value;
        }

        return $files;
    }

    // public function uploadSingleFile($data)
    // {
    //     $uploadedFiles = $data->file('attachments');

    //     $files = array();

    //     if (!empty($uploadedFiles)) {
    //         foreach ($uploadedFiles as $uploadedFile) {
    //             $fileUploader = new FileUploader();
    //             $uploadedFile = $fileUploader->uploadRelatedDocuments($uploadedFile, $project_code);
    //             $value[] = $uploadedFile;
    //         }
    //         $files['related_documents'] = $value;
    //     }

    //     return $files;
    // }
}
