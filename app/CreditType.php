<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditType extends Model
{
    protected $guarded = [];

    protected $casts = [
        'has_pharmacology_amount' => 'boolean',
    ];

    public function accreditation_types()
    {
        return $this->hasMany('App\CreditTypeProject', 'credit_type_id');
    }

    public function accreditation_types_non_mli()
    {
        return $this->hasMany('App\CreditTypeNonMliProject', 'credit_type_id');
    }
}
