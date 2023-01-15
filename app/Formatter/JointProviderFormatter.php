<?php

namespace App\Formatter;

class JointProviderFormatter
{

    function format($data)
    {

        $formated_data = [
            'name'                 => $data->name,
            'jp_code'              => $data->jp_code,
            'address1'             => $data->address1,
            'address2'             => $data->address2,
            'city'                 => $data->city,
            'state'                => $data->state,
            'zip'                  => $data->zip,

        ];

        return $formated_data;
    }
}
