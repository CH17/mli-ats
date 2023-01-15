<?php

namespace App\Formatter;

use App\FileUploader\FileUploader;
use Illuminate\Support\Facades\Storage;

class UserUpdateFormatter
{


    function formate($data)
    {

        $formated_data = [
            'initials'      => $data->initials,
            'name'          => $data->name,
            'email'         => $data->email,
        ];

        if (!empty($data->file('profile_image'))) {
            $project_data = new FileUploader();
            $uploadedFile = $data->file('profile_image');
            $profile_image = $project_data->uploadFile($uploadedFile, 'profile');
            if (!empty($profile_image['file_name'])) {
                $formated_data = [
                    'avatar'  => Storage::url('profile/' . $profile_image['file_name'])
                ];
            }
        }

        return $formated_data;
    }
}
