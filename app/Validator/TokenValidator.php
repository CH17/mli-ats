<?php 
namespace App\Validator;
use Validator;

class TokenValidator {

    public function uservalidation($data){

        $userData = array(
            'initials'  => $data->initials,
            'name'      => $data->name,
            'email'     => $data->email,
            'role_id'   => $data->role_id            
        );


        $rules = array(
            'initials'   =>  'required',
            'name'       =>  'required', 'string', 'max:255',
            'email'      =>  'required|string|email|max:255|unique:user_tokens,email', 
            'role_id'    =>  'required'
        );

        $messages = [
            'initials.required'   => 'Initials must not be empty',            
            'role_id.required'    => 'Please select role.'            
        ];

        return Validator::make($userData,$rules,$messages);
    }
}
?>