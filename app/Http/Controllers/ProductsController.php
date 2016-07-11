<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {

	public function create() {
		return view('products.create');
	}

	public function getAll() {
		$products = Product::all();
		return view('products.list', compact('products'));
	}

	public function getAllMy() {
		$user_id  = Auth::user()->id;
		$products = Product::where('user_id', $user_id)->get();
		return view('products.myList', compact('products'));
	}

	public function listByParameter(Request $request) {
		$products = Product::where();
		return view('products.search', compact('products'));
	}

	public function listByUser(User $user) {
		$products = Product::find($user->id);
		return view('products.list', compact('products'));
	}

	public function listByBranch(Brand $brand) {
		$products = Product::find($brand->id);
		return view('products.list', compact('products'));
	}

	public function listBySections(Section $section) {
		$products = Product::find($section->id);
		return view('products.list', compact('products'));
	}

	public function listByLikeUsers(User $user) {
		//
	}

	public function detail(Product $product) {
		return view('products.detail', compact('product'));
	}

	public function update(Product $product) {

		$sections = Section::all();
		$branchs  = Branch::all();
		return view('users.update', compact('product', 'sections', 'branchs'));
	}

	public function save(Request $request, Product $product) {

		$product->update($request->all());
		return back()->with('msg', 'Los datos se modificaron correctamente.');
	}

	//

}
