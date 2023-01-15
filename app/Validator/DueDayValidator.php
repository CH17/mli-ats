<?php

namespace App\Validator;

use Validator;

class DueDayValidator
{

    function validate($data)
    {

        $userData = array(
            'due_days'                => $data->due_days,
        );

        $rules = array(
            'due_days'                => 'required',
        );

        $messages = [
            'due_days.required'                => 'Due business day must not be empty.',
        ];

        return Validator::make($userData, $rules, $messages);
    }
}
