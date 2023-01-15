<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Jac15Request extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'add_date'        => 'required|date',       
            'year_quarter'    => 'required|max:15',       
            'ipce_team'       => 'required|max:500',       
            'cpd_need'        => 'nullable|max:500',
            'learning_plan'   => 'nullable|max:500',
            'time_resources'  => 'nullable|max:500',
        ];
    }
}
