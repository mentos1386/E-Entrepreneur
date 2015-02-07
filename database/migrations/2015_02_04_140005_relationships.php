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
			'dashboard' => false,
			'users_edit' => false,
			'comments_post' => true,
			'comments_moderate' => false,
			'statistics_view' => false,
			'store_buy' => true,
			'store_add' => false,
			'store_orders' => false,
			'settings_edit' => false,
			'posts_create' => false
		));
		DB::table('permissions')->insert(array(
			'id' => 2,
			'role_id' => 2,
			'dashboard' => true,
			'users_edit' => true,
			'comments_post' => true,
			'comments_moderate' => true,
			'statistics_view' => true,
			'store_buy' => true,
			'store_add' => true,
			'store_orders' => true,
			'settings_edit' => true,
			'posts_create' => true
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
