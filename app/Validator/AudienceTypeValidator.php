<?php

namespace App\Validator;

use Validator;

class AudienceTypeValidator
{

    function step1validation($data)
    {

        $userData = array(
            'order'                => $data->order,
            'audience_type'        => $data->audience_type,
        );

        $rules = array(
            'order'                => 'required',
            'audience_type'        => 'required|max:255',

        );


        $messages = [
            'order.required'                  => 'Order must not be empty.',
            'audience_type.required'          => 'Audience Type must not be empty.',

        ];


        return Validator::make($userData, $rules, $messages);
    }
}
