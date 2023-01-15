<?php 
namespace App\Formatter;
use Str;
use Illuminate\Support\Facades\Hash;
class UserFormatter{

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
    function format($data){        

       

        $formated_data=[            
            'initials'      => $data->initials,
            'name'          => $data->name,
            'email'         => $data->email,        
            'status'        => $data->status, 
            'password'      => Hash::make($data->password),
            'remember_token'=> Str::random(15)            
        ];

        return $formated_data;
        
    }


    


}


?>