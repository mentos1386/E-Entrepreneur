<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('users_edit');
			$table->boolean('comments_post');
			$table->boolean('comments_moderate');
			$table->boolean('statistics_view');
			$table->boolean('store_buy');
			$table->boolean('store_add');
			$table->boolean('store_orders');
			$table->boolean('settings_edit');
			$table->boolean('posts_create');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}
