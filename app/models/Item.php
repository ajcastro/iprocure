<?php

class Item extends \Eloquent
{
	protected $fillable = [];

    public function plans()
    {
        return $this->belongsToMany('Plan', 'plan_item');
    }
}