<?php

namespace App\Validator;

use Validator;

class CreditTypeValidator
{

    function step1validation($data)
    {

        $userData = array(
            'order'                => $data->order,
            'credit_code'          => $data->credit_code,
            'credit_name'          => $data->credit_name,
        );

        $rules = array(
            'order'                => 'required',
            'credit_code'          => 'required|max:255',
            'credit_name'          => 'required|max:255',

        );


        $messages = [
            'order.required'                => 'Order must not be empty.',
            'credit_code.required'          => 'Credit Code must not be empty.',
            'credit_name.required'          => 'Credit Name must not be empty.',

        ];


        return Validator::make($userData, $rules, $messages);
    }
}
