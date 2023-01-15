<?php

namespace App\Validator;

use Validator;

class MocCreditTypeValidator
{

    function step1validation($data)
    {

        $userData = array(
            'moc_board_id'                      => $data->moc_board_id,
            'order'                             => $data->order,
            'credit_type'                       => $data->credit_type,
            'credit_amount'                     => $data->credit_amount,
        );

        $rules = array(
            'moc_board_id'                      => 'required',
            'order'                             => 'required',
            'credit_type'                       => 'required|max:255',
            'credit_amount'                     => 'required',
        );


        $messages = [
            'moc_board_id.required'             => 'Moc Board must not be empty.',
            'order.required'                    => 'Order must not be empty.',
            'credit_type.required'              => 'Credit Type must not be empty.',
            'credit_amount.required'            => 'Credit Amount must not be empty.',
        ];


        return Validator::make($userData, $rules, $messages);
    }
}
