<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use App\User;
use App\Categories;
use App\Tag;
use App\Store;
use App\Reviews;
use App\Post;
use App\Comment;

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
        $this->command->info('--------');

        $this->call('CategoryTableSeeder');
        $this->command->info('Category table seeded!');
        $this->command->info('--------');

        $this->call('TagsTableSeeder');
        $this->command->info('Tags table seeded!');
        $this->command->info('--------');

        $this->call('StoreTableSeeder');
        $this->command->info('Store table seeded!');
        $this->command->info('--------');

        $this->call('ReviewsTableSeeder');
        $this->command->info('Reviews table seeded!');
        $this->command->info('--------');

        $this->call('PostsTableSeeder');
        $this->command->info('Post table seeded!');
        $this->command->info('--------');

        $this->call('CommentsTableSeeder');
        $this->command->info('Comments table seeded!');
        $this->command->info('--------');

        $this->command->info('Done :P');
	}

}

class UserTableSeeder extends Seeder {

	public function run(){

		$faker = Faker::create();

		foreach(range(1,30) as $index){

			User::create([
				'username' => $faker->userName,
				'email' => $faker->email,
				'password' => Hash::make($faker->userName),
				'role_id' => $faker->randomElement([1, 2])
			]);

		}
	}

}

class CategoryTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 30) as $index) {

            Categories::create([
                'name' => $faker->name,
                'comment' => $faker->text(),
            ]);

        }
    }

}

class TagsTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 30) as $index) {

            Tag::create([
                'name' => $faker->name,
                'comment' => $faker->text(),
            ]);

        }
    }

}

class StoreTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        $images = [

            [
                'url' => 'https://i.4cdn.org/wg/1429224967643.jpg',
                'text' => 'Some info'
            ],
            [
                'url' => 'https://i.4cdn.org/wg/1429225005165.jpg',
                'text' => 'Some text'
            ],
            [
                'url' => 'https://i.4cdn.org/wg/1429225044405.jpg',
                'text' => 'Some shit'
            ],
            [
                'url' => 'https://i.4cdn.org/wg/1429224930813.png',
                'text' => 'Some amazing'
            ],
            [
                'url' => 'https://i.4cdn.org/wg/1429225089299.jpg',
                'text' => 'Some stuff'
            ]

        ];

        foreach (range(1, 30) as $index) {

            $store = Store::create([
                'name' => $faker->name,
                'description' => $faker->text(),
                'price' => $faker->numberBetween(1, 1000),
                'stock' => $faker->numberBetween(1, 100),
                'active' => 1,
                'images' => json_encode($images),
            ]);
            //Add category
            $store->categories()->attach($faker->numberBetween(1, 30));

            //Add tags (2)
            $store->tags()->attach($faker->numberBetween(1, 30));
            $store->tags()->attach($faker->numberBetween(1, 30));
        }
    }
}

class ReviewsTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 90) as $index) {

            Reviews::create([
                'comment' => $faker->text(),
                'name' => $faker->name(),
                'email' => $faker->email(),
                'store_id' => $faker->numberBetween(1, 30),
                'user_id' => null,
                'rating' => $faker->numberBetween(1, 10),
            ]);

        }
    }

}

class PostsTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 15) as $index) {

            $post = Post::create([
                'title' => $faker->name(),
                'body' => $faker->text(),
                'user_id' => $faker->numberBetween(1, 30),
            ]);

            //Add category
            $post->category()->attach($faker->numberBetween(1, 30));

            //Add tags (2)
            $post->tag()->attach($faker->numberBetween(1, 30));
            $post->tag()->attach($faker->numberBetween(1, 30));

        }
    }

}

class CommentsTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 90) as $index) {

            Comment::create([
                'comment' => $faker->text(),
                'name' => $faker->name(),
                'email' => $faker->email(),
                'post_id' => $faker->numberBetween(1, 15),
                'user_id' => null,
            ]);

        }
    }

}