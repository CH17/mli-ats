<?php

namespace App\Formatter;

class MocCreditTypeFormatter
{

    function format($data)
    {

        $formated_data = [
            'moc_board_id'                      => $data->moc_board_id,
            'order'                             => $data->order,
            'credit_type'                       => $data->credit_type,
            'credit_amount'                       => $data->credit_amount,

        ];

        return $formated_data;
    }
}
