<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }

    protected $casts = [
        'include' => 'boolean',
        'moc' => 'boolean',
        'bias_target_met' => 'boolean',
        'c_measure' => 'boolean',
        'c_exclude' => 'boolean',
        'loif_target_met' => 'boolean',
        'itc_target_met' => 'boolean',
        'pc_target_met' => 'boolean',
        'poc_target_greater_than_95' => 'boolean',
        'p_measure' => 'boolean',
        'p_exclude' => 'boolean',
        'pif_met' => 'boolean',
        'po_measure' => 'boolean',
        'po_exclude' => 'boolean',
        'poif_met' => 'boolean',
        'eb_content_target_greater_than_95' => 'boolean',
        'rel_content_target_greater_than_95' => 'boolean',
        'format_target_greater_than_95' => 'boolean',
        'faculty_target_greater_than_95' => 'boolean',
        'int_learning_target_greater_than_95' => 'boolean',
        'ps_target_greater_than_95' => 'boolean',
        'barrier_identified' => 'boolean',
        'strategies_incorporated' => 'boolean',
    ];
}
