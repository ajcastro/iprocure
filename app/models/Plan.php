<?php

class Plan extends \Eloquent
{
    protected $typecasts = [
    ];

	protected $fillable = [];

    public function items()
    {
        return $this->belongsToMany('Item', 'plan_item')->withPivot('unit_id', 'qty', 'price');
    }

    public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists)
    {
        if ($parent instanceof Item) {
            return new PlanItem($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}
