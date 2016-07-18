<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
				'name' => 'Tierrasana',
			]);
		DB::table('brands')->insert([
				'name' => 'El Renuevo',
			]);
		DB::table('brands')->insert([
				'name' => 'Orígenes',
			]);
		DB::table('brands')->insert([
				'name' => 'Saros',
			]);
		DB::table('brands')->insert([
				'name' => 'Oro Rubí',
			]);
		DB::table('brands')->insert([
				'name' => 'Gourmer',
			]);
		DB::table('brands')->insert([
				'name' => 'La esquina de las Flores',
			]);
		DB::table('brands')->insert([
				'name' => 'Arytza',
			]);
		DB::table('brands')->insert([
				'name' => 'Quinto Sabor',
			]);
		DB::table('brands')->insert([
				'name' => 'Tucanguá',
			]);
		DB::table('brands')->insert([
				'name' => 'Amanda',
			]);
		DB::table('brands')->insert([
				'name' => 'Deli And Raw',
			]);
		DB::table('brands')->insert([
				'name' => 'Bior Candies',
			]);
		DB::table('brands')->insert([
				'name' => 'Wallys',
			]);
		DB::table('brands')->insert([
				'name' => 'Heredia',
			]);
		DB::table('brands')->insert([
				'name' => 'Kraus',
			]);
		DB::table('brands')->insert([
				'name' => 'Chaman',
			]);
		DB::table('brands')->insert([
				'name' => 'Inti Zen',
			]);
		DB::table('brands')->insert([
				'name' => 'Natu Fresh',
			]);
		DB::table('brands')->insert([
				'name' => 'Cuyen',
			]);
		DB::table('brands')->insert([
				'name' => 'Alto Salvador',
			]);
		DB::table('brands')->insert([
				'name' => 'El Trebol',
			]);
		DB::table('brands')->insert([
				'name' => "Pasta D'Oro",
			]);
    }
}
