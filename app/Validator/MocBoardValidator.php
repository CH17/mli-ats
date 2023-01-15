<?php

namespace App\Validator;

use Validator;

class MocBoardValidator
{

    function step1validation($data)
    {

        $userData = array(
            'order'                             => $data->order,
            'board'                             => $data->board,
            'board_code'                        => $data->board_code,
            'moc_code'                          => $data->moc_code,
        );

        $rules = array(
            'order'                             => 'required',
            'board'                             => 'required|max:255',
            'board_code'                        => 'required|max:255',
            'moc_code'                          => 'required|max:255',

        );


        $messages = [
            'order.required'                    => 'Order must not be empty.',
            'board.required'                    => 'Board Name must not be empty.',
            'board_code.required'               => 'Board Code must not be empty.',
            'moc_code.required'                 => 'Moc Code must not be empty.',

        ];


        return Validator::make($userData, $rules, $messages);
    }
}
