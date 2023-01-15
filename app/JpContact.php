<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JpContact extends Model
{
    protected $guarded = [];

    public function joint_provider()
    {
        return $this->belongsTo('App\JointProvider', 'jp_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'jp_contact_id');
    }
}
