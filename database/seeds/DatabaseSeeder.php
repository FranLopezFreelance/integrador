<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		
		$this->call(CitiesSeeder::class);

		$this->call(BrandSeeder::class);

		$this->call(UsuariosSeeder::class);

		$this->call(SectionSeeder::class);

		$this->call(TypeSeeder::class);
		
		DB::table('qualityproducts')->insert([
				'name' => 'No me gustó',
			]);
		DB::table('qualityproducts')->insert([
				'name' => 'Normal',
			]);
		DB::table('qualityproducts')->insert([
				'name' => 'Buen Producto',
			]);
		DB::table('qualityproducts')->insert([
				'name' => 'Muy buen Producto',
			]);
		DB::table('qualityproducts')->insert([
				'name' => 'Excelente Producto',
			]);
		DB::table('qualitycustomers')->insert([
				'name' => 'Nunca se comunicó',
			]);
		DB::table('qualitycustomers')->insert([
				'name' => 'Neutral',
			]);
		DB::table('qualitycustomers')->insert([
				'name' => 'Comprador Responsable',
			]);
		DB::table('qualitysellers')->insert([
				'name' => 'Excelente Predisposición',
			]);
		DB::table('qualitysellers')->insert([
				'name' => 'Nunca se comunicó',
			]);
		DB::table('qualitysellers')->insert([
				'name' => 'Neutral',
			]);
		DB::table('qualitysellers')->insert([
				'name' => 'Vendedor Responsable',
			]);
		DB::table('qualitysellers')->insert([
				'name' => 'Excelente Atención',
			]);
		
		
	}
}