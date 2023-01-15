<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MliFee extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo('App\Project', 'activity_id');
    }
}
