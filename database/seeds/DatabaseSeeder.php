<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('types')->insert([
				'name' => 'Comprador',
			]);
		DB::table('types')->insert([
				'name' => 'Vendedor',
			]);
		DB::table('cities')->insert([
				'name' => 'Abasto',
			]);
		DB::table('cities')->insert([
				'name' => 'Almagro',
			]);
		DB::table('cities')->insert([
				'name' => 'Agronomía',
			]);
		DB::table('cities')->insert([
				'name' => 'Boedo',
			]);
		DB::table('cities')->insert([
				'name' => 'Balvanera',
			]);
		DB::table('cities')->insert([
				'name' => 'Belgrano',
			]);
		DB::table('cities')->insert([
				'name' => 'Caballito',
			]);
		DB::table('cities')->insert([
				'name' => 'Colegiales',
			]);
		DB::table('cities')->insert([
				'name' => 'Flores',
			]);
		DB::table('cities')->insert([
				'name' => 'Floresta',
			]);
		DB::table('cities')->insert([
				'name' => 'Liniers',
			]);
		DB::table('cities')->insert([
				'name' => 'Palermo',
			]);
		DB::table('cities')->insert([
				'name' => 'Paternal',
			]);
		DB::table('cities')->insert([
				'name' => 'Parque Chaz',
			]);
		DB::table('cities')->insert([
				'name' => 'Parque Saavedra',
			]);
		DB::table('cities')->insert([
				'name' => 'Recoleta',
			]);
		DB::table('cities')->insert([
				'name' => 'Retiro',
			]);
		DB::table('cities')->insert([
				'name' => 'San Nicolás',
			]);
		DB::table('cities')->insert([
				'name' => 'Villa Crespo',
			]);
		DB::table('cities')->insert([
				'name' => 'Villa Luro',
			]);
		DB::table('cities')->insert([
				'name' => 'Villa Ortuzar',
			]);
		DB::table('cities')->insert([
				'name' => 'Villa Urquiza',
			]);
		DB::table('cities')->insert([
				'name' => 'San Telmo',
			]);
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