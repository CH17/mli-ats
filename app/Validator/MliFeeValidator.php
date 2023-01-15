<?php

namespace App\Validator;

use Validator;

class MliFeeValidator
{

    function step1validation($data)
    {

        $userData = array(
            'activity_id'                       => $data->activity_id,
            'accreditation_fee'                 => $data->accreditation_fee,            
        );

        $rules = array(
            'activity_id'                       => 'required',
            'accreditation_fee'                 => 'required',          
        );


        $messages = [
            'activity_id.required'              => 'Activity must not be empty.',
            'accreditation_fee.required'        => 'Accreditation Fee must not be empty.',          
        ];


        return Validator::make($userData, $rules, $messages);
    }
}
