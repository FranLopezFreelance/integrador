<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualifycustomersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('qualifycustomers', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->integer('customer_id');
				$table->integer('order_id');
				$table->integer('quality_id');
				$table->string('comment');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('qualifycustomers');
	}
}
