<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestpapersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testpapers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('creater',30);
			$table->string('name',100);
			$table->dateTime('start_time');
			$table->dateTime('end_time');
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
		Schema::drop('testpapers');
	}

}
