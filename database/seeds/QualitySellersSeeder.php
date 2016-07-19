<?php

use Illuminate\Database\Seeder;

class QualitySellersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
