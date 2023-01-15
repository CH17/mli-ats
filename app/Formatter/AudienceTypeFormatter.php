<?php

namespace App\Formatter;

class AudienceTypeFormatter
{

    function format($data)
    {

        $formated_data = [
            'order'               => $data->order,
            'audience_type'       => $data->audience_type,

        ];

        return $formated_data;
    }
}
