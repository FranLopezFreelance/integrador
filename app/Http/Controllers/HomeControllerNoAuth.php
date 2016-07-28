<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;


class HomeControllerNoAuth extends Controller
{
    public function home(){
    	$productos = Product::all();
		$productsDestacados = Product::paginate(8);
		$productsUltimosPublicados = Product::where('id', '>', 92)->paginate(8);;
		//Obviamente la query está turbia. Es una solucion de momento, no logré hacer funcionar last().
		$productsMejorPuntuados = Product::paginate(3);
		$productsMejorVendidos = Product::paginate(3);
		return view('home', compact('productos', 'productsMejorPuntuados', 'productsMejorVendidos', 'productsDestacados', 'productsUltimosPublicados'));
    }
}
