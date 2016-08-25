<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StyleTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 2) as $index)
		{
			Style::create([
                'name'        => $faker->text(20),
                'description' => $faker->text,
			]);
		}
	}

}