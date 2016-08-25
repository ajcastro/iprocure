<?php

use Illuminate\Database\Eloquent\Relations\Pivot;

class PlanItem extends Pivot
{
    protected $table = 'plan_item';

    public function unit()
    {
        return $this->belongsTo('Unit');
    }
}