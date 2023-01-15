<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $guarded = [];

    protected $table = 'project_status';

    public function projects()
    {
        return $this->hasMany('App\Project', 'status_id');
    }
}
