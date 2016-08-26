<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PlanItemTableSeeder extends Seeder {

	public function run()
	{
		$plans = Plan::all();
        $items = Item::limit(3)->get();
        $units = Unit::limit(2)->get();

		foreach($plans as $plan) {
            $itemIds = [];
            foreach ($items as $item) {
                $itemIds[$item->id] = ['unit_id' => $units->random()->id, 'qty' => rand(1, 3), 'price' => rand(5, 10)];
            }

            $plan->items()->sync($itemIds);
		}
	}
}
