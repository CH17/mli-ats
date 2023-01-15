<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MocPractice extends Model
{
    protected $guarded = [];

    public function moc_board()
    {
        return $this->belongsTo('App\MocBoard', 'moc_board_id');
    }
}
