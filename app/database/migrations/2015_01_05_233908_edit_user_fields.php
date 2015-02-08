<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUserFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('first_name',100)->nullable();
			$table->string('last_name',100)->nullable();
			$table->string('email',100)->unique();
			$table->biginteger('uid');
			$table->string('access_token');
			$table->string('access_toker_secret');
			$table->text('remember_token',100);
			$table->string('nickname');
			$table->timestamps();

			$table->index('email');
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
