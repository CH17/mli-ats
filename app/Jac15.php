<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jac15 extends Model
{
    protected $guarded = [];

    protected $table = 'jac15';

    public function setAddDateAttribute($add_date)
    {
        $this->attributes['add_date'] = date("Y-m-d", strtotime($add_date));
    }

    public function getAddDateAttribute($add_date)
    {
        return date("m/d/Y", strtotime($add_date));
    }
}
