<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemTableSeeder extends Seeder {

	public function run()
	{
		$fake = Faker::create();

		foreach(range(1, 10) as $index) {
			Item::create([
				'unit_id'     => 1,
				'name'        => $fake->word,
				'description' => $fake->text,
			]);
		}
	}
}
