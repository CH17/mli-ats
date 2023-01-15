<?php

namespace App\Validator;

use Validator;

class JpContactValidator
{

    function step1validation($data)
    {

        $userData = array(
            'jp_id'                             => $data->jp_id,
            'contact_name'                      => $data->contact_name,
            'contact_email'                     => $data->contact_email,
        );

        $rules = array(
            'jp_id'                             => 'required',
            'contact_name'                      => 'required|max:255',
            'contact_email'                     => 'required|email',

        );


        $messages = [
            'jp_id.required'                    => 'Joint Provider must not be empty.',
            'contact_name.required'             => 'Contact Name must not be empty.',
            'contact_email.required'            => 'Contact Email must not be empty.',

        ];


        return Validator::make($userData, $rules, $messages);
    }
}
