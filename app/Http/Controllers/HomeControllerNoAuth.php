<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Section;
use App\Product;
use App\City;
use App\Brand;


class HomeControllerNoAuth extends Controller
{
    public function home(){
    	$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$products = Product::paginate(8);
		$productsMejorPuntuados = Product::paginate(3);
		$productsMejorVendidos = Product::paginate(3);
		return view('home', compact('products', 'productsMejorPuntuados', 'productsMejorVendidos', 'sections', 'brands', 'cities'));
    }
}
