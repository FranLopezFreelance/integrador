<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller {

	public function create(Request $request, Product $product) {
		$q     = $request->input('quantity');
		$total = $product->price*$q;
		$order = new Order;
		$order->setCustomerId(Auth::user()->id);
		$order->setSellerId($product->user_id);
		$order->setState(1);
		$order->setTotal($total);
		$order->save();
		$order->addItem($order, $product, $q);
		return redirect('/orders/purchases/')->with('msg', 'La Orden se generó correctamente.');
	}

	public function purchasesList() {
		$user      = Auth::user();
		$purchases = $user->purchases;
		return view('orders.purchases', compact('purchases'));
	}

	public function salesList() {
		$user  = Auth::user();
		$sales = $user->sales;
		return view('orders.sales', compact('sales'));
	}
}
