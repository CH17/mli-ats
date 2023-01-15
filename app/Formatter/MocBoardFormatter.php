<?php

namespace App\Formatter;

class MocBoardFormatter
{

    function format($data)
    {

        $formated_data = [
            'order'                             => $data->order,
            'board'                             => $data->board,
            'board_code'                        => $data->board_code,
            'moc_code'                          => $data->moc_code,

        ];

        return $formated_data;
    }
}
