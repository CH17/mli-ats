<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'user_id', 'project_id'
    ];


    

    /**
     * used_by
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
