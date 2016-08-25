<?php

class Plan extends \Eloquent
{
	protected $fillable = [];

    public function items()
    {
        return $this->belongsToMany('Item', 'plan_item');
    }
}
