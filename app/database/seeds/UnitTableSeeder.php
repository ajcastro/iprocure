<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UnitTableSeeder extends Seeder {

	public function run()
	{
        $fake = Faker::create();

		$units = [
            'pc', 'box'
        ];

		foreach($units as $unit) {
			Unit::create([
                'name'        => $unit,
                'description' => $fake->text
			]);
		}
	}
}
