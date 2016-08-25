<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PlanTableSeeder extends Seeder {

	public function run()
	{
		$fake = Faker::create();

		foreach(range(1, 10) as $index) {
			Plan::create([
                'name'        => $fake->text(30),
                'description' => $fake->text,
			]);
		}
	}

}