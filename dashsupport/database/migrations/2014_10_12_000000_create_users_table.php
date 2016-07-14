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
			$table->string('photo');
           	$table->string('user_no');
			$table->string('first_name');
			$table->string('last_name');
			$table->unsignedInteger('dept_id')->nullable();
			$table->string('email_add')->unique();
			$table->string('password');
			$table->string('password_confirm');
			$table->string('user_type')->unsigned()->nullable();
			$table->integer('active');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
