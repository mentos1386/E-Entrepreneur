<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\User;

class UserTableSeeder extends Seeder {

    public function run(){

        $faker = Faker::create();

        foreach(range(1,50) as $index){

            User::create([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make($faker->userName),
                'role' => $faker->randomElement(['admin', 'user', 'moderator'])
            ]);

        }
    }

}