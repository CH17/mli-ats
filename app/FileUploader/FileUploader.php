<?php

namespace App\FileUploader;

use Storage;
use Illuminate\Support\Str;

class FileUploader
{

    function uploadFile($uploadedFile, $project_code = 'P', $path = 'file')
    {


        $file = $uploadedFile->getClientOriginalName();

        $name = Str::slug(pathinfo($file, PATHINFO_FILENAME), '-');
        $extension = pathinfo($file, PATHINFO_EXTENSION);

         $filename = time() .'_'.$name . '.' . $extension;

        Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return $filename;
    }

    function uploadRelatedDocuments($uploadedFile, $project_code, $path = 'file')
    {
        $MimeType = $uploadedFile->getClientMimeType();

        $file = $uploadedFile->getClientOriginalName();

        $name = Str::slug(pathinfo($file, PATHINFO_FILENAME), '-');
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $filename = $name . '.' . $extension;

        Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return $filename;
    }

    function uploadDisDocuments($uploadedFile, $project_code, $path = 'file')
    {
        $MimeType = $uploadedFile->getClientMimeType();
        $file = $uploadedFile->getClientOriginalName();

        $name = Str::slug(pathinfo($file, PATHINFO_FILENAME), '-');
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $filename = $name . '.' . $extension;

        Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return $filename;
    }

    function uploadFile7($uploadedFile, $project_code, $path = 'file')
    {
        $MimeType = $uploadedFile->getClientMimeType();

        // $user = !empty(auth()->user()) ? auth()->user()->initials : 'USER';       

        // $filename = 'CSD' . '_' . $project_code . '_' . $user . '_' . time() . '_' . Str::random(5) . '.' . $uploadedFile->getClientOriginalExtension();

        //  $filename = $uploadedFile->getClientOriginalName();

        $file = $uploadedFile->getClientOriginalName();

        $name = Str::slug(pathinfo($file, PATHINFO_FILENAME), '-');
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $filename = $name . '.' . $extension;

        Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return $filename;
    }
}
