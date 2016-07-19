<?php

use Illuminate\Database\Seeder;

class QualityCostumersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualitycustomers')->insert([
				'name' => 'Nunca se comunicó',
			]);
		DB::table('qualitycustomers')->insert([
				'name' => 'Neutral',
			]);
		DB::table('qualitycustomers')->insert([
				'name' => 'Comprador Responsable',
			]);
    }
}
