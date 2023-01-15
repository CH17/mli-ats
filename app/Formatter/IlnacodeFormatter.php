<?php

namespace App\Formatter;
use Illuminate\Support\Str;

class IlnacodeFormatter
{

    function format($data)
    {

        $formated_data = [
            'order'           => $data->order,
            'subject_area'    => $data->subject_area,   
            'slug'            => Str::slug($data->subject_area)

        ];

        return $formated_data;
    }
}
