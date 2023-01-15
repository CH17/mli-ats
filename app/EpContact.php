<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpContact extends Model
{
    protected $guarded = [];

    public function educational_partner()
    {
        return $this->belongsTo('App\EducationalPartner', 'ep_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Project', 'ep_contact_id');
    }
}
