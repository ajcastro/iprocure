<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan_item', function(Blueprint $table)
		{
			$table->increments('id');
			Fk::make($table)->add('plan_id');
			Fk::make($table)->add('item_id');
			Fk::make($table)->add('unit_id');
			$table->decimal('qty', 15, 3);
			$table->decimal('price', 15, 3);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plan_item');
	}

}
