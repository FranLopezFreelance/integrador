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
				$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
				$table->string('name');
				$table->integer('section_id')->unsigned();
				$table->foreign('section_id')->references('id')->on('sections');
				$table->integer('brand_id')->unsigned();
				$table->foreign('brand_id')->references('id')->on('brands');
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
