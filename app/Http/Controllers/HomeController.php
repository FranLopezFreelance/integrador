<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
		$usersFollowing = Auth::user()->following;
		$products       = Product::orderBy('id', 'DESC')->limit(8)->offset(0)->get();
		$products2      = Product::orderBy('id', 'ASC')->limit(8)->offset(0)->get();
		return view('home', compact('usersFollowing', 'products', 'products2'));
	}

	public function welcome() {
		$usersFollowing = Auth::user()->following;
		$products       = Product::orderBy('id', 'DESC')->limit(8)->offset(0)->get();
		return view('welcome', compact('products', 'usersFollowing'));
	}
}
