<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');
	}

}

class UserTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		foreach(range(1,15) as $index){

			User::create([
				'username' => $faker->userName,
				'email' => $faker->email,
				'password' => Hash::make($faker->userName),
				'role_id' => $faker->randomElement([1, 2])
			]);

		}
	}

}