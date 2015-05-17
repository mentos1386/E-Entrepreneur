<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();

			$table->string('mobile_phone')->nullable();
			$table->string('work_phone')->nullable();

			$table->string('address_street')->nullable();
			$table->string('address_city')->nullable();
			$table->string('address_post')->nullable();
			$table->string('address_country')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data');
	}

}
