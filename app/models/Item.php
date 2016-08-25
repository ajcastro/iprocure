<?php

class Item extends \Eloquent
{
	protected $fillable = [];

    public function plans()
    {
        return $this->belongsToMany('Plan', 'plan_item');
    }

    public function unit()
    {
        return $this->belongsTo('Unit');
    }

    public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Plan) {
            return new PlanItem($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}