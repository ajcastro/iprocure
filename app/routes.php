<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('plans', function () {
    return Plan::with(['items.pivot.unit'])->get();
});

Route::get('test', function () {
   return Item::with(['plans.items', 'plans.pivot.unit', 'plans.pivot.style'])->get();
});