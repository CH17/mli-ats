<?php

namespace App\Validator;

use Validator;

class JointProviderValidator
{

    function step1validation($data)
    {

        $userData = array(
            'name'                 => $data->name,
            'jp_code'              => $data->jp_code,
            'address1'             => $data->address1,
            'address2'             => $data->address2,
            'city'                 => $data->city,
            'state'                => $data->state,
            'zip'                  => $data->zip,
        );

        $rules = array(
            'name'                => 'required|max:255',
            'jp_code'             => 'required|max:255',
            'address1'            => 'required|max:255',
            'city'                => 'required|max:255',

        );


        $messages = [
            'name.required'                => 'Provider Name must not be empty.',
            'jp_code.required'             => 'Provider Code must not be empty.',
            'address1.required'            => 'Address must not be empty.',
            'city.required'                => 'City must not be empty.',

        ];


        return Validator::make($userData, $rules, $messages);
    }
}
