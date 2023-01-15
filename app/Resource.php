<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $guarded = [];

    public static function boot()
    {

        parent::boot();
    
        self::saving(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }
}
