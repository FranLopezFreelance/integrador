<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {

	protected function validator(array $data) {
		return Validator::make($data, [
				'name'        => 'required|max:255',
				'description' => 'required|max:255',
				'brand_id'    => 'required',
				'section_id'  => 'required',
				'quantity'    => 'required',
				'price'       => 'required',
			]);
	}

	protected function create(Request $request) {
		$product = Product::create($request->all());
		$product->setUserId(Auth::user()->id);
		$product->save();
		return redirect("products/detail/$product->id")->with('msg', 'El Producto se creó correctamente.');
	}

	public function store() {
		$brands   = Brand::all();
		$sections = Section::all();
		return view('products.create', compact('brands', 'sections'));
	}

	public function getAll() {
		$products = Product::all();
		return view('products.list', compact('products'));
	}

	public function getAllMy() {
		$products = Product::where('user_id', Auth::user()->id)->get();
		return view('products.myList', compact('products'));
	}

	public function listByParameter(Request $request) {
		$products = Product::where();
		return view('products.search', compact('products'));
	}

	public function listByUser(User $user) {
		$products = Product::where('user_id', $user->id)->get();
		return view('products.list', compact('products'));
	}

	public function listBySections(Section $section) {
		$products = Product::where('section_id', $section->id)->get();
		return view('products.list', compact('products'));
	}

	public function listByBrand(Brand $brand) {
		$products = Product::where('brand_id', $brand->id)->get();
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
		$brands   = Brand::all();
		return view('products.update', compact('product', 'sections', 'brands'));
	}

	public function save(Request $request, Product $product) {
		$product->update($request->all());
		return back()->with('msg', 'Los datos se modificaron correctamente.');
	}
}
