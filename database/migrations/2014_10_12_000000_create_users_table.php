<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name');
				$table->string('lastname');
				$table->string('email')->unique();
				$table->string('password');
				$table->integer('user_type');
				$table->integer('city_id');
				$table->string('avatar');
				$table->rememberToken();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}
}
