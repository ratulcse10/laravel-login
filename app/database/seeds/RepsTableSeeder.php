<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RepsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Rep::create([
					'user_id' => User::find(2)->id,
					'name' => $faker->name,
					'address' => $faker->address,
					'phone' => $faker->phoneNumber,
					'city' => $faker->city,
					'state' => $faker->streetAddress,
					'zip' => $faker->postcode
		]);
	}

}