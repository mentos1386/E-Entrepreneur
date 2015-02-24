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
			'dashboard_settings_tools' => false,
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
			'dashboard_settings_tools' => true,
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
			'name' => 'Fake Name',
			'language' => 'en',
		));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$e = 'aa';
	}

}
