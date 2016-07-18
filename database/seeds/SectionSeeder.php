<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
				'name' => 'Alimentos',
			]);
		DB::table('sections')->insert([
				'name' => 'Jugos',
			]);
		DB::table('sections')->insert([
				'name' => 'Vinos',
			]);
		DB::table('sections')->insert([
				'name' => 'Galletitas',
			]);
		DB::table('sections')->insert([
				'name' => 'Cuidado Personal',
			]);
		DB::table('sections')->insert([
				'name' => 'Condimentos',
			]);
		DB::table('sections')->insert([
				'name' => 'Dulces',
			]);
		DB::table('sections')->insert([
				'name' => 'Aceites',
			]);
		DB::table('sections')->insert([
				'name' => 'Legumbres',
			]);
		DB::table('sections')->insert([
				'name' => 'Infusiones',
			]);
		DB::table('sections')->insert([
				'name' => 'Frutos Secos',
			]);
    }
}
