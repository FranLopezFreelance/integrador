<?php

use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('events')->insert([
				'name' => 'te ha hecho una compra.',
			]);

		DB::table('events')->insert([
				'name' => 'confirmó la entrega de un producto.',
			]);

		DB::table('events')->insert([
				'name' => 'ha calificado un producto.',
			]);

		DB::table('events')->insert([
				'name' => 'te ha calificado.',
			]);
	}
}
