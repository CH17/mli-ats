<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditTypeNonMliProject extends Model
{
    protected $guarded = [];

    public function credit_type()
    {
        return $this->belongsTo('App\CreditType', 'credit_type_id');
    }
}
