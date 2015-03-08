<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTypesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagetypes', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('dashboard');
            $table->string('view');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagetypes');
    }

}
