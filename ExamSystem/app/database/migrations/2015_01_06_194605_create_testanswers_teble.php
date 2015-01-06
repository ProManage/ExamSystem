<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestanswersTeble extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testanswers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',30);
			$table->integer('testpaper_id');
			$table->integer('testquestion_id');
			$table->text('answer');
			$table->integer('score')->default(0);
			$table->timestamps();
			$table->unique(['username','testquestion_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('testanswers');
	}

}
