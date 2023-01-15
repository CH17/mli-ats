<?php

namespace App\Formatter;

class CreditTypeFormatter
{
 
    function format($data)
    {

        $formated_data = [
            'order'                        => $data->order,
            'credit_code'                  => $data->credit_code,
            'credit_name'                  => $data->credit_name,
            'level'                        => $data->level,
            'has_pharmacology_amount'      => !empty($data->has_pharmacology_amount) ? true : false,
            'criteria'                     => !empty($data->criteria) ? json_encode($data->criteria) : null,
        ];

        return $formated_data;
    }
}
