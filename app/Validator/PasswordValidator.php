<?php 
namespace App\Validator;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
class PasswordValidator {
    
    public function passwordValidation($data){

        $userData = array(
            'current_password'       => $data->current_password,
            'new_password'           => $data->new_password,
            'new_confirm_password'   => $data->new_confirm_password
        );

        $rules = array(
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required','different:current_password'],
            'new_confirm_password' => ['same:new_password'],                     
        );

        

        return Validator::make($userData,$rules);
    }

    public function userPasswordValidation($data){

        $userData = array(          
            'new_password'           => $data->new_password,
            'new_confirm_password'   => $data->new_confirm_password
        );

        $rules = array(            
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],                     
        );
        

        return Validator::make($userData,$rules);
    }

    
    
}
