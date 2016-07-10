<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->string('name');
				$table->integer('brand_id');
				$table->integer('section_id');
				$table->string('description');
				$table->float('price');
				$table->string('image');
				$table->integer('quantity');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('products');
	}
}
