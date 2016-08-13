<?php

namespace App\Http\Controllers;

use App\Brand;
use App\City;

use App\Image;
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

		$image = new Image([
				'path'   => 'images/products/default.jpg',
				'active' => 1,
				'order'  => 1
			]);

		$product->images()->save($image);

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
		$products = Product::paginate(12);
		return view('products.list', compact('products', 'sections', 'brands', 'cities'));
	}

	public function getAllMyProducts() {
		$products = Product::where('user_id', Auth::user()->id)->paginate(8);
		return view('users.profile.products', compact('products'));
	}

	public function listByParameter(Request $request) {
		$parameter = $request->input('parameter');
		$products  = Product::where('name', 'LIKE', "%$parameter%")
			->orWhere('description', 'LIKE', "%$parameter%")
			->paginate(8);
		return view('products.search', compact('products', 'parameter'));
	}

	public function listByUser(User $user) {
		$products = Product::where('user_id', $user->id)->paginate(8);
		$sections = Section::all();
		$cities   = City::all();

		return view('products.list', compact('products', 'sections', 'cities'));
	}

	public function listBySection(Request $request) {
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$products = Product::where('section_id', $request->input('id'))->paginate(8);
		$s        = Section::find($request->input('id'));
		return view('products.list', compact('products', 's', 'sections', 'brands', 'cities'));
	}

	public function listByBrand(Request $request) {
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$products = Product::where('brand_id', $request->input('id'))->paginate(12);
		$b        = Brand::find($request->input('id'));
		return view('products.list', compact('products', 'b', 'sections', 'brands', 'cities'));
	}

	public function listByCity(Request $request) {
		$products = [];
		$sections = Section::All();
		$brands   = Brand::All();
		$cities   = City::All();
		$products = Product::all();
		$s        = Section::find($request->input('id'));
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
			return redirect('/login');
		}

		$sections = Section::All();
		$brands   = Brand::All();
		return view('products.update', compact('product', 'sections', 'brands'));
	}

	public function buy(Product $product) {
		if (Auth::guest()) {
			return redirect('/login');
		}

		return view('products.buy', compact('product'));
	}

	public function save(Request $request, Product $product) {
		$product->update($request->all());
		return back()->with('msg', 'Los datos se modificaron correctamente.');
	}

	public function uploadImages(Request $request, Product $product) {

		$file = $request->file('file');
		$name = time().$file->getClientOriginalName();
		$path = 'images/products/'.$product->id;
		$file->move($path, $name);

		$image = new Image([
				'path'   => $path.'/'.$name,
				'active' => 1,
				'order'  => 1
			]);

		$product->images()->save($image);

	}
}