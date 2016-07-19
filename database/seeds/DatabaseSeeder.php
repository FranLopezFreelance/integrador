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

		$this->call(TypeSeeder::class);

		$this->call(SectionSeeder::class);

		$this->call(UsuariosSeeder::class);

		$this->call(ProductsSeeder::class);
		
		$this->call(QualityProductsSeeder::class);

		$this->call(QualityCostumersSeeder::class);

		$this->call(QualitySellersSeeder::class);

		//$this->call(FollowingSeeder::class);
	}
}