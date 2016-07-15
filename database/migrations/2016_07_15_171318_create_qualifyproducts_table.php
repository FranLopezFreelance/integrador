<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualifyproductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('qualifyproducts', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('user_id');
				$table->integer('product_id');
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
		Schema::drop('qualifyproducts');
	}
}
