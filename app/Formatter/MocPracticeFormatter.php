<?php

namespace App\Formatter;

class MocPracticeFormatter
{

    function format($data)
    {

        $formated_data = [
            'moc_board_id'                      => $data->moc_board_id,
            'order'                             => $data->order,
            'practice_areas'                    => $data->practice_areas,

        ];

        return $formated_data;
    }
}
