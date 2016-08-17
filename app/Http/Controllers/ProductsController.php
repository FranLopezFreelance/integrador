<?php

namespace App\Http\Controllers;

use App\Brand;
use App\City;

use App\Image;
use App\Product;
use App\Section;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

	public function detail(Product $product) {
		return view('products.detail', compact('product'));
	}

	public function update(Product $product) {
		if (Auth::guest()) {
			return redirect('/login');
		}

		if ($product->user_id != Auth::user()->id) {
			return redirect('products/detail/'.$product->id);
		}

		$sections = Section::All();
		$brands   = Brand::All();
		$images   = $product->images()->where('active', 1)->get();
		return view('products.update', compact('product', 'sections', 'brands', 'images'));
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

		/*$cantImages = $product->images()->where('active', 1)->count();
		if ($cantImages >= 4) {
		return null;
		}
		$file = $request->file('file');
		$name = time().$file->getClientOriginalName();
		$path = 'images/products/'.$product->id;
		$file->move($path, $name);
		//Desactivo la imágen por default
		$imageDefault         = Image::where('path', 'images/products/default.jpg')->get()->first();
		$imageDefault->active = 0;
		$imageDefault->save();
		//Instancio la nueva imágen y la guardo a través de la relación
		$image = new Image([
		'path'   => $path.'/'.$name,
		'active' => 1,
		'order'  => 1
		]);
		$product->images()->save($image);*/

		$cantImages = $product->images()->where('active', 1)->count();

		if ($cantImages >= 4) {
			return null;
		}

		$file = $request->file('file');
		$name = $product->id.'-'.time().'.'.$file->getClientOriginalExtension();

		$path = 'images/products';
		Storage::disk($path)->put($name, File::get($file));

		//Desactivo la imágen por default
		$imageDefault = Image::where('path', 'images/products/default.jpg')
			->where('product_id', $product->id)->get()->first();

		$imageDefault->active = 0;
		$imageDefault->save();

		//Instancio la nueva imágen y la guardo a través de la relación
		$image = new Image([
				'path'   => $name,
				'active' => 1,
				'order'  => 1
			]);

		$product->images()->save($image);

	}

	public function getProductImage($name) {
		$image = Storage::disk('images/products')->get($name);
		return new Response($image, 200);
	}

	public function orderImagesUpdate(Request $request) {

		$imageIds = $request->input('imageIds');

		//Iterador para el orden de la imágen
		$i = 1;

		foreach ($imageIds as $id) {
			$newOrderImage        = Image::find($id);
			$newOrderImage->order = $i;
			$newOrderImage->save();
			$i++;
		}

		return 'El orden de las Imágenes se Guardó correctamente.';
	}

	public function imageDelete(Image $image) {

		$image->delete();
		$product = Product::find($image->product_id);

		$cantImages = $product->images()->where('active', 1)->count();

		if ($cantImages == 0) {

			//Activo la imágen por default
			$imageDefault = Image::where('path', 'images/products/default.jpg')
				->where('product_id', $product->id)->get()->first();

			$imageDefault->active = 1;
			$imageDefault->save();
		}

		return back()->with('msg', 'La imágen se borró correctamente');

	}
}