<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{   
   // protected $fillable =['user_id'];
    protected $guarded = [];
    public function project_user(){
        return $this->belongsTo('App\User','user_id');
    }
}
