<?php

namespace App\Http\Controllers;

use App\Brand;
use App\City;
use App\Product;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {

	/*public function __construct() {
	$this->middleware('auth');
	}*/

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
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$products = Product::all();
		return view('products.list', compact('products', 'sections', 'brands', 'cities'));
	}

	public function getAllMyProducts() {
		$products = Product::where('user_id', Auth::user()->id)->get();
		return view('products.myList', compact('products'));
	}

	public function listByParameter(Request $request) {
		$parameter = $request->input('parameter');
		$products  = Product::where('name', 'LIKE', "%$parameter%")
			->orWhere('description', 'LIKE', "%$parameter%")
			->get();
		return view('products.search', compact('products', 'parameter'));
	}

	public function listByUser(User $user) {
		$products = Product::where('user_id', $user->id)->get();
		return view('products.list', compact('products'));
	}

	public function listBySection(Request $request) {
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$s        = Section::find($request->input('id'));
		$products = $s->products;
		return view('products.list', compact('products', 's', 'sections', 'brands', 'cities'));
	}

	public function listByBrand(Request $request) {
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$b        = Brand::find($request->input('id'));
		$products = $b->products;
		return view('products.list', compact('products', 'b', 'sections', 'brands', 'cities'));
	}

	public function listByCity(Request $request) {
		$products = [];
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$c        = City::find($request->input('id'));
		$users    = $c->users;
		foreach ($users as $user) {
			$products[] = $user->products;
		}
		return view('products.list', compact('products', 'c', 'sections', 'brands', 'cities'));
	}

	public function detail(Product $product) {
		return view('products.detail', compact('product'));
	}

	public function update(Product $product) {
		if (Auth::guest()) {
			return redirect('/');
		}

		$sections = Section::All();
		$brands   = Brand::All();
		return view('products.update', compact('product', 'sections', 'brands'));
	}

	public function save(Request $request, Product $product) {
		$product->update($request->all());
		return back()->with('msg', 'Los datos se modificaron correctamente.');
	}
}