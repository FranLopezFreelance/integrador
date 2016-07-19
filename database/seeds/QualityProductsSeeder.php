<?php

use Illuminate\Database\Seeder;

class QualityProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
