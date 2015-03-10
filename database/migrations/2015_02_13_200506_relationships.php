<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		 * Create relationship for users table
		 */
		Schema::table('users', function(Blueprint $table){

			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade');

			// TODO: Implant this?
			//$table->integer('data_id')->unsigned();
			//$table->foreign('data_id')->references('id')->on('data')->onUpdate('cascade');

		});

		/*
		 * Create relationship for posts table
		 */
		Schema::table('posts', function(Blueprint $table){

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

		});

		/*
		 * Create relationship for roles table
		 */
		Schema::table('permissions', function(Blueprint $table){

			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');

		});

		/*
		 * Create relationship for comments table
		 */
		Schema::table('comments', function(Blueprint $table){

			$table->integer('post_id')->unsigned();
			$table->foreign('post_id')->references('id')->on('posts');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

		});

		/*
		 * Create relationship for links table
		 */
		Schema::table('links', function (Blueprint $table)
		{

			$table->integer('menu_id')->unsigned();
			$table->foreign('menu_id')->references('id')->on('menus');

		});

		/*
		 * Create relationship for pages table
		 */
		Schema::table('pages', function (Blueprint $table)
		{

			$table->integer('pagetypes_id')->unsigned();
			$table->foreign('pagetypes_id')->references('id')->on('pagetypes');

		});

		/*
		 *
		 * Create basic roles for users
		 *
		 */
		DB::table('roles')->insert(array(
			'name' => 'Default',
			'comment' => 'This role gets every user that registers for first time.',
			'default' => true
		));
		DB::table('roles')->insert(array(
			'name' => 'Admin',
			'comment' => 'Basic Admin role, it has ALL permissions'
		));

		/*
		 *
		 * Create basic permissions for roles
		 *
		 */
		DB::table('permissions')->insert(array(
			'id' => 1,
			'role_id' => 1,

			// Backend
			'dashboard' => false,
			'dashboard_users' => false,
			'dashboard_blog_posts' => false,
			'dashboard_blog_comments' => false,
			'dashboard_statistics' => false,
			'dashboard_store_add' => false,
			'dashboard_store_orders' => false,
			'dashboard_settings' => false,
			'dashboard_appearance' => false,
			'dashboard_pages' => false,

			// Frontend
			'user_comments_post' => true,
			'user_store_buy' => true

		));
		DB::table('permissions')->insert(array(
			'id' => 2,
			'role_id' => 2,
			// Backend
			'dashboard' => true,
			'dashboard_users' => true,
			'dashboard_blog_posts' => true,
			'dashboard_blog_comments' => true,
			'dashboard_statistics' => true,
			'dashboard_store_add' => true,
			'dashboard_store_orders' => true,
			'dashboard_settings' => true,
			'dashboard_appearance' => true,
			'dashboard_pages' => true,

			// Frontend
			'user_comments_post' => true,
			'user_store_buy' => true
		));

		/*
		 *
		 * Create ROOT user, Owner should delete this after he created his own acc
		 *
		 * TODO: Look TODO DOWN!
		 *
		 */
		DB::table('users')->insert(array(
			'username' => 'root',
			'email' => 'root@root.com',
			'password' => Hash::make('root'),
			'role_id' => 2
		));

		/*
		 *
		 * Create FAKE name AND essential Data
		 *
		 * TODO: User Should Be Prompted A Form If This Data Is Not In Database And Put It In Database
		 *
		 */

		DB::table('app')->insert(array(
			'name'        => 'Company Co.',
			'language' => 'en',
			'description'     => 'Some Awesome Company that dose Fun stuff',
			'theme'           => 'Default',
			'theme_frontpage' => 'posts',
		));

		DB::table('posts')->insert(array(
			'title'   => 'John Lennon',
			'body'    => 'John Ono Lennon, MBE, born John Winston Lennon; (9 October 1940 – 8 December 1980), was an English musician, singer and songwriter who rose to worldwide fame as a founder member of the rock band the Beatles, the most commercially successful band in the history of popular music. With Paul McCartney, he formed a songwriting partnership that is one of the most celebrated of the 20th century. Born and raised in Liverpool, as a teenager Lennon became involved in the skiffle craze; his first band, the Quarrymen, evolved into the Beatles in 1960. When the group disbanded in 1970, Lennon embarked on a solo career that produced the critically acclaimed albums John Lennon/Plastic Ono Band and Imagine, and iconic songs such as "Give Peace a Chance" and "Working Class Hero". After his marriage to Yoko Ono in 1969, he changed his name to John Ono Lennon. Lennon disengaged himself from the music business in 1975 to raise his infant son Sean, but re-emerged with Ono in 1980 with the new album Double Fantasy. He was murdered three weeks after its release.',
			'user_id' => '1'
		));

		DB::table('pagetypes')->insert(array(
			'name'        => 'Default',
			'description' => 'Default page View',
			'dashboard'   => 'default',
			'view'        => 'default',
		));

		DB::table('pages')->insert(array(
			'name'         => 'About',
			'content'      => 'Some About Page.',
			'url'          => 'about',
			'pagetypes_id' => '1',
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$e = 'aa'; // php artisan migrate:rollback DOSNT REALY WORK!
	}

}
