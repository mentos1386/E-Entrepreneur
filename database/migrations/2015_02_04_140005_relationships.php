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
		Schema::table('users', function(Blueprint $table){

			$table->integer('roles_id')->unsigned()->index();
			$table->foreign('roles_id')->reference('id')->on('roles');

		});

		Schema::table('posts', function(Blueprint $table){

			$table->integer('users_id')->unsigned()->index();
			$table->foreign('users_id')->reference('id')->on('users');

		});

		Schema::table('roles', function(Blueprint $table){

			$table->integer('permissions_id')->unsigned()->index();
			$table->foreign('permissions_id')->reference('id')->on('permissions');

		});

		Schema::table('comments', function(Blueprint $table){

			$table->integer('posts_id')->unsigned()->index();
			$table->foreign('posts_id')->reference('id')->on('posts');

			$table->integer('users_id')->unsigned()->index();
			$table->foreign('users_id')->reference('id')->on('users');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('*');
	}

}
