<?php

namespace App\Validator;

use Validator;

class IlnacodeValidator
{

    function validate($data)
    {

        $formData = array(
            'order'                             => $data->order,
            'subject_area'                      => $data->subject_area,
        );

        $rules = array(
            'order'                             => 'required',
            'subject_area'                      => 'required|max:255'

        );


        $messages = [
            'order.required'                    => 'Order must not be empty.',
            'subject_area.required'             => 'Subject Area must not be empty.'
        ];


        return Validator::make($formData, $rules, $messages);
    }
}
