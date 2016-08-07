<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller {

	public function create(Request $request, Product $product) {

		$seller_id = $product->user_id;

		$q     = $request->input('quantity');
		$total = $product->price*$q;
		$order = new Order;
		$order->setCustomerId(Auth::user()->id);
		$order->setSellerId($seller_id);
		$order->setTotal($total);
		$order->save();
		$order->addItem($order, $product, $q);

		//NOTIFICATION//
		session('pusher')->trigger('notificactionn', 'new', [
				'title'   => 'Te han hecho una compra',
				'user_id' => $seller_id
			]);

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

	public function customerOK(Order $order) {

		$seller_id = $order->seller->id;

		$order->setCustomerOK(1);
		$order->save();

		//NOTIFICATION//
		session('pusher')->trigger('notificactionn', 'new', [
				'title'   => 'Han confirmado la entrega de un producto.',
				'user_id' => $seller_id
			]);

		return back()->with('msg', 'Entrega confirmada. No te olvides de calificar al Vendedor y los Productos.');
	}

	public function sellerOK(Order $order) {

		$customer_id = $order->customer->id;

		$order->setSellerOK(1);
		$order->save();

		//NOTIFICATION//
		session('pusher')->trigger('notificactionn', 'new', [
				'title'   => 'Han confirmado la entrega de un producto.',
				'user_id' => $customer_id
			]);

		return back()->with('msg', 'Entrega confirmada. No te olvides de calificar al Comprador.');
	}
}
