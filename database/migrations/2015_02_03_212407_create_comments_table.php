<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			//$table->integer('posts_id')->unsigned()->index();
			//$table->integer('users_id')->unsigned()->index();
			$table->text('body');
			$table->timestamps();

			//$table->foreign('posts_id')->reference('id')->on('posts')->onDelete('cascade');
			//$table->foreign('users_id')->reference('id')->on('users')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
