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

			//$table->integer('role_id')->unsigned();

			// Backend
			$table->boolean('dashboard');
			$table->boolean('dashboard_users');
			$table->boolean('dashboard_blog_comments');
			$table->boolean('dashboard_blog_posts');
			$table->boolean('dashboard_statistics');
			$table->boolean('dashboard_store_add');
			$table->boolean('dashboard_store_orders');
			$table->boolean('dashboard_pages');
			$table->boolean('dashboard_appearance');
			$table->boolean('dashboard_settings_tools');

			// Frontend
			$table->boolean('user_store_buy');
			$table->boolean('user_comments_post');
			$table->timestamps();

			//$table->foreign('role_id')->references('id')->on('roles');
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
