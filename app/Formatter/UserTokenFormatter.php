<?php 
namespace App\Formatter;
use Str;
use Illuminate\Support\Facades\Hash;
class UserTokenFormatter{

    /*#####################################################
    #------------------------------------------------------
    # Function formate 
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/
    function formate($data){        

        $formated_data=[            
            'initials'      =>$data->initials,
            'name'          =>$data->name,
            'email'         =>$data->email,        
            'role_id'       =>$data->role_id,            
            'token'         =>Str::random(15)            
        ];

        return $formated_data;
        
    }


    


}


?>