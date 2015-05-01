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

        $this->call('ThemeTableSeeder');
        $this->command->info('Theme_Data table seeded!');
        $this->command->info('--------');

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

class ThemeTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('theme_data')->insert(
            [
                'pos' => '0',
                'type' => 'text',
                'data' => '{"title":"Who are we?","text":"Company Co. is a new production company offering technology and production services to artists, brands and cultural institutions. We bring together experience from video production, events, digital and the arts to help people realise cross disciplinary projects","image":"https:\/\/farm6.staticflickr.com\/5154\/14185447737_0aba637f46_b.jpg","style":"1"}',
            ]);
        DB::table('theme_data')->insert(
            [
                'pos' => '0',
                'type' => 'images',
                'data' => '{"header":"Our Products","sub_header":"","images":{"1":{"title":"Beatty-Waters","text":"Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.","url":"https:\/\/farm3.staticflickr.com\/2931\/14185401130_c97e7c4c28_b.jpg","btn_text":"More","btn_custom_url":"","btn_url":"http:\/\/epodjetnik.app\/store\/10"},"2":{"title":"Goodwin PLC","text":"Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.","url":"https:\/\/farm4.staticflickr.com\/3840\/14185496197_946aa54169_b.jpg","btn_text":"More","btn_custom_url":"","btn_url":"http:\/\/epodjetnik.app\/store\/21"},"3":{"title":"Cruickshank Inc","text":"Adipiscing a commodo ante nunc magna lorem et interdum mi ante nunc lobortis non amet vis sed volutpat et nascetur.","url":"https:\/\/farm6.staticflickr.com\/5553\/14348881016_d8cfc543e7_b.jpg","btn_text":"More","btn_custom_url":"","btn_url":"http:\/\/epodjetnik.app\/store\/6"}},"style":"2"}',
            ]);
        DB::table('theme_data')->insert(
            [
                'pos' => '0',
                'type' => 'buttons',
                'data' => '{"header":"You can find us here","sub_header":"","buttons":{"1":{"text":"Facebook","icon":"fa-facebook","custom_url":"https:\/\/www.facebook.com\/","url":"","special":""},"2":{"text":"Twitter","icon":"fa-twitter","custom_url":"https:\/\/www.twitter.com\/","url":"","special":""},"3":{"text":"","icon":"","custom_url":"","url":"","special":""}},"style":"1"}',
            ]);
        DB::table('theme_data')->insert(
            [
                'pos' => '0',
                'type' => 'gallery',
                'data' => '{"header":"Our Passion","sub_header":"","images":{"1":{"url":"\/Photon\/public\/images\/travel.jpg","hover":"Travel","size":"wide-2col"},"2":{"url":"\/Photon\/public\/images\/breakfast.jpg","hover":"Breakfast","size":"narrow-1col"},"3":{"url":"\/Photon\/public\/images\/coffe.jpg","hover":"Coffe","size":"wide-2col"},"4":{"url":"\/Photon\/public\/images\/freetime.jpg","hover":"Free time","size":"wide-2col"},"5":{"url":"\/Photon\/public\/images\/work.jpg","hover":"Work","size":"wide-2col"},"6":{"url":"\/Photon\/public\/images\/culture.jpg","hover":"Culture","size":"narrow-1col"},"7":{"url":"\/Photon\/public\/images\/coding.jpg","hover":"Coding","size":"wide-2col"},"8":{"url":"\/Photon\/public\/images\/snow.jpg","hover":"Snow","size":"narrow-1col"},"9":{"url":"\/Photon\/public\/images\/nature.jpg","hover":"Nature","size":"narrow-1col"}},"style":"2"}',
            ]);
        DB::table('theme_data')->insert(
            [
                'pos' => '0',
                'type' => 'maps',
                'data' => '{"header":"We are here","sub_header":"","address":"","style":"1"}',
            ]);

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

        foreach (range(1, 10) as $index) {

            Categories::create([
                'name' => $faker->name,
                'comment' => $faker->realText(),
            ]);

        }
    }

}

class TagsTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {

            Tag::create([
                'name' => $faker->name,
                'comment' => $faker->realText(),
            ]);

        }
    }

}

class StoreTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create();

        $image_urls = [
            "https://i.4cdn.org/wg/1430236469188.jpg",
            "https://i.4cdn.org/wg/1430234615806.jpg",
            "https://i.4cdn.org/wg/1430234584056.jpg",
            "https://i.4cdn.org/wg/1430232652813.jpg",
            "https://i.4cdn.org/wg/1430232473024.jpg",
            "https://i.4cdn.org/wg/1430230558900.jpg",
            "https://i.4cdn.org/wg/1430228078394.jpg",
            "https://i.4cdn.org/wg/1430227994572.jpg",
            "https://i.4cdn.org/wg/1430227839282.png",
            "https://i.4cdn.org/wg/1430227798951.jpg",
            "https://i.4cdn.org/wg/1430224331450.jpg",
            "https://i.4cdn.org/wg/1430148508607.jpg",

        ];

        foreach (range(1, 30) as $index) {

            $images = [
                [
                    "url" => $faker->randomElement($image_urls),
                    "text" => $faker->paragraph(),
                ],
                [
                    "url" => $faker->randomElement($image_urls),
                    "text" => $faker->paragraph(),
                ],
                [
                    "url" => $faker->randomElement($image_urls),
                    "text" => $faker->paragraph(),
                ]
            ];

            $store = Store::create([
                'name' => $faker->company(),
                'description' => $faker->realText() . implode($faker->paragraphs(10)),
                'price' => $faker->numberBetween(1, 1500),
                'stock' => $faker->numberBetween(1, 100),
                'active' => 1,
                'images' => json_encode($images),
            ]);
            //Add category
            $store->categories()->attach($faker->numberBetween(1, 10));

            //Add tags (2)
            $store->tags()->attach($faker->numberBetween(1, 10));
            $store->tags()->attach($faker->numberBetween(1, 10));
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
            $post->category()->attach($faker->numberBetween(1, 10));

            //Add tags (2)
            $post->tag()->attach($faker->numberBetween(1, 10));
            $post->tag()->attach($faker->numberBetween(1, 10));

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