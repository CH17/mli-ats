<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JointProvider extends Model
{
    protected $guarded = [];

    public function jp_contact()
    {
        return $this->hasMany('App\JpContact', 'jp_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'jp_id');
    }
}
