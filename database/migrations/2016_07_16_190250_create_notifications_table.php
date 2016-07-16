<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('notifications', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->integer('event_user_id');
				$table->integer('event_id');
				$table->string('url');
				$table->integer('status_id');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('notifications');
	}
}
