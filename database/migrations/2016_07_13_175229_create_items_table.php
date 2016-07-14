<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('items', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('order_id')->unsigned();
				$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
				$table->integer('product_id')->unsigned();
				$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
				$table->integer('quantity');
				$table->float('price');
				$table->float('subtotal');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('items');
	}
}
