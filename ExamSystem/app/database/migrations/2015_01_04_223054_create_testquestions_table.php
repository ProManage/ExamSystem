<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestquestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testquestions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('testpaper_id');
			$table->integer('question_id');
			$table->integer('placement');
			$table->integer('value');
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
		Schema::drop('testquestions');
	}

}
