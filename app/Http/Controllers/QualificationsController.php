<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Qualifycustomer;
use App\Qualifyproduct;
use App\Qualifyseller;
use App\Qualitycustomer;
use App\Qualityproduct;
use App\Qualityseller;
use Illuminate\Http\Request;

class QualificationsController extends Controller {

	public function customer(Order $order) {
		$qualities = Qualitycustomer::all();
		return view('qualifications.customer', compact('order', 'qualities'));
	}

	public function seller(Order $order) {
		$qualities = Qualityseller::all();
		return view('qualifications.seller', compact('order', 'qualities'));
	}

	public function product(Order $order) {
		$qualities = Qualityproduct::all();
		return view('qualifications.product', compact('order', 'qualities'));
	}

	public function qualifyProduct(Request $request, Order $order) {

		$product_id = $order->items->first()->product_id;

		$product = Product::find($product_id);

		$seller_id = 1;

		$qualification = new Qualifyproduct;
		$qualification->setUserId($order->customer_id);
		$qualification->setProductId($product_id);
		$qualification->setOrderId($order->id);
		$qualification->setQualityId($request->input('quality_id'));
		$qualification->setComment($request->input('comment'));
		$qualification->save();

		return redirect('/orders/purchases')->with('msg', 'La calificación fué realizada.');
	}

	public function qualifySeller(Request $request, Order $order) {

		$seller_id = $order->seller_id;

		$qualification = new Qualifyseller;
		$qualification->setUserId($order->customer_id);
		$qualification->setSellerId($seller_id);
		$qualification->setOrderId($order->id);
		$qualification->setQualityId($request->input('quality_id'));
		$qualification->setComment($request->input('comment'));
		$qualification->save();

		return redirect('/orders/purchases')->with('msg', 'La calificación fué realizada.');
	}

	public function qualifyCustomer(Request $request, Order $order) {

		$customer_id = $order->customer_id;

		$qualification = new Qualifycustomer;
		$qualification->setUserId($order->seller_id);
		$qualification->setCustomerId($order->customer_id);
		$qualification->setOrderId($order->id);
		$qualification->setQualityId($request->input('quality_id'));
		$qualification->setComment($request->input('comment'));
		$qualification->save();

		return redirect('/orders/sales')->with('msg', 'La calificación fué realizada.');
	}
}
