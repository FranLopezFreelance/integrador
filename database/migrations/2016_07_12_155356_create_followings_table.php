<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFollowingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('followings', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
				$table->integer('following_id')->unsigned();
				$table->foreign('following_id')->references('id')->on('users');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('followings');
	}
}
