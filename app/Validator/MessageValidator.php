<?php 
namespace App\Validator;
use Illuminate\Support\Facades\Validator;

class MessageValidator {
    
    public function validation($data){

        $userData = array(
            'message'       => $data->message,
            
        );

        $rules = array(
            'message'     => ['required','max:255']                            
        );        

        return Validator::make($userData,$rules);
    }

    
    
}
?>