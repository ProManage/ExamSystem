<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 30);
            $table->string('email', 50)->nullable();
            $table->string('password', 80);
            $table->string('role', 10)->default('student');
            $table->string('student_id', 20)->nullable();
            $table->string('remember_token', 100);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
            $table->unique('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
