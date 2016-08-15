<?php

namespace App\Http\Controllers;

use App\Product;

class HomeControllerNoAuth extends Controller {
	public function home() {
		$productos                 = Product::all();
		$productsDestacados        = Product::paginate(8);
		$productsUltimosPublicados = Product::orderBy('id', 'desc')->limit(6);
		;
		//Obviamente la query está turbia. Es una solucion de momento, no logré hacer funcionar last().
		$productsMejorPuntuados = Product::paginate(3);
		$productsMejorVendidos  = Product::paginate(3);

		//NOTIFICATION//
		/*	session('pusher')->trigger('notificactionn', 'new', [
		'title'   => 'Estraron en la HOME!',
		'user_id' => 'No Hay...'
		]);*/

		return view('home', compact('productos', 'productsMejorPuntuados', 'productsMejorVendidos', 'productsDestacados', 'productsUltimosPublicados'));
	}
}
