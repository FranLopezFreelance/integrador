<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orders', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('customer_id')->unsigned();
				$table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
				$table->integer('seller_id')->unsigned();
				$table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
				$table->integer('customer_ok');
				$table->integer('seller_ok');
				$table->float('total');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('orders');
	}
}
