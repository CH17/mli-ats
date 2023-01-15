<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MocBoard extends Model
{
    protected $guarded = [];

    public function moc_credit_type()
    {
        return $this->hasMany('App\MocCreditType', 'moc_board_id');
    }

    public function moc_practice()
    {
        return $this->hasMany('App\MocPractice', 'moc_board_id');
    }
}
