<?php

namespace App\Formatter;

class JpContactFormatter
{

    function format($data)
    {

        $formated_data = [
            'jp_id'            => $data->jp_id,
            'contact_name'     => $data->contact_name,
            'contact_email'    => $data->contact_email,
            'telephone1'       => $data->telephone1,
            'telephone2'       => $data->telephone2,

        ];

        return $formated_data;
    }
}
