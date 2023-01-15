<?php

namespace App\Formatter;

class MliFeeFormatter
{

    function format($data)
    {

        $formated_data = [
            'activity_id'                       => $data->activity_id,
            'accreditation_fee'                 => $data->accreditation_fee,
            'non_accreditation_revenue'         => $data->non_accreditation_revenue,
            'meeting_expense'                   => $data->meeting_expense,

        ];

        return $formated_data;
    }
}
