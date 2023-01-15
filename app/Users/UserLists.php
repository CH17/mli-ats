<?php 
namespace App\Users;
use \App\User;
use \App\Role;
class UserLists{

       

    /*#####################################################
    #------------------------------------------------------
    # Function userArray 
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/
    public function userArray(){

        //$users= User::pluck('name','id'); 
        
        $roles = Role::with('users')
                    ->get();
        $users=array();
        foreach($roles as $role){
            $users[$role->name]= $role->users->pluck('name','id');
        }
         
        return $users;         
    }
}


?>