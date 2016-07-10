<?php

namespace App\Http\Controllers;

use App\Branch;

use App\Product;

use App\Section;

use App\User;

use Illuminate\Http\Request;

class ProductsController extends Controller {

	public function create() {
		return view('products.create');
	}

	public function get() {
		$products = Product::all();
		return view('products.list', compact('products'));
	}

	public function listByParameter(Request $request) {
		$products = Product::where();
		return view('products.search', compact('products'));
	}

	public function listByUser(User $user) {
		$products = Product::find($user->id);
		return view('products.list', compact('products'));
	}

	public function listByBranch(Branch $branch) {
		$products = Product::find($barnch->id);
		return view('products.list', compact('products'));
	}

	public function listBySections(Section $section) {
		$products = Product::find($section->id);
		return view('products.list', compact('products'));
	}

	public function listByLikeUsers(User $user) {
		//
	}

	public function show(Product $product) {
		return view('products.show', $product);
	}

	public function update(Product $product) {
		return view('products.update', $product);
	}

	public function save(Product $product) {
		$product->save();
	}
}
