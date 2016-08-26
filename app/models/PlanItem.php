<?php

use SedpMis\Lib\Models\Pivot;

class PlanItem extends Pivot
{
    protected $typecasts = [
        'qty'   => 'int',
        'price' => 'float',
    ];

    protected $table = 'plan_item';

    public function unit()
    {
        return $this->belongsTo('Unit');
    }
}