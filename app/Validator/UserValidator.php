<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class UserValidator
{

    public function uservalidation($data)
    {

        $userData = array(
            'initials'         =>  $data->initials,
            'name'             =>  $data->name,
            'email'            =>  $data->email,
            'password'         =>  $data->password,
            'confirm_password' =>  $data->confirm_password,
            'role_id'          =>  $data->role_id,
            'status'           =>  $data->status
        );


        $rules = array(
            'initials'         =>  'required',
            'name'             =>  'required|string|max:255',
            'email'            =>  'required|email|string|max:255|unique:users',
            'password'         =>  'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' =>  'min:8',
            'role_id'          =>  'required',
            'status'           =>  'required'
        );

        $messages = array(
            'role_id.required' =>  'Role must not be empty!',
            'status.required'  =>  'Status must not be empty!'
        );


        return Validator::make($userData, $rules, $messages);
    }

    public function userProfileValidation($data, $user_id)
    {

        $userData = array(
            'initials'       =>  $data->initials,
            'name'           =>  $data->name,
            'email'          =>  $data->email,
            'profile_image'  =>  $data->profile_image
        );


        $rules = array(
            'initials'       =>  'required',
            'name'           =>  'required', 'string', 'max:255',
            'email'          =>  'required|email', 'string', 'max:255', 'unique:users,' . $user_id,      
        );

        return Validator::make($userData, $rules);
    }


    public function userUpdateValidation($data, $user_id)
    {

        $userData = array(
            'initials'         =>  $data->initials,
            'name'             =>  $data->name,
            'email'            =>  $data->email,       
            'role_id'          =>  $data->role_id,
            'status'           =>  $data->status
        );


        $rules = array(
            'initials'         =>  'required',
            'name'             =>  'required', 'string', 'max:255',
            'email'            =>  'required|string|email|max:255|unique:users,email,' . $user_id,                     
            'role_id'          =>  'required',
            'status'           =>  'required'
        );

        $messages = array(
            'role_id.required' =>  'Role must not be empty!',
            'status.required'  =>  'Status must not be empty!'
        );

        return Validator::make($userData, $rules, $messages);
    }
}
