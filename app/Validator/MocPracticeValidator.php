<?php

namespace App\Validator;

use Validator;

class MocPracticeValidator
{

    function step1validation($data)
    {

        $userData = array(
            'moc_board_id'                      => $data->moc_board_id,
            'order'                             => $data->order,
            'practice_areas'                    => $data->practice_areas,
        );

        $rules = array(
            'moc_board_id'                      => 'required',
            'order'                             => 'required',
            'practice_areas'                    => 'required|max:255',
        );


        $messages = [
            'moc_board_id.required'             => 'Moc Board must not be empty.',
            'order.required'                    => 'Order must not be empty.',
            'practice_areas.required'           => 'Practice Area must not be empty.',
        ];


        return Validator::make($userData, $rules, $messages);
    }
}
