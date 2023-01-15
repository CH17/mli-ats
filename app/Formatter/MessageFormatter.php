<?php 
namespace App\Formatter;
use Illuminate\Support\Facades\Auth;

class MessageFormatter{

    
    function formate($data){        
        
        $formated_data=[            
            'message'    =>$data->message,
            'user_id'    =>Auth::user()->id,                         
            'project_id' =>$data->project_id,                         
        ];
                
        return $formated_data;
        
    }


    


}


?>