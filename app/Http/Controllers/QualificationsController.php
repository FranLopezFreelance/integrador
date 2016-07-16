<?php

namespace App\Http\Controllers;

use App\Order;
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
		$qualification = new Qualifyproduct;
		$qualification->setUserId($order->customer_id);
		$qualification->setProductId($order->items->first()->product_id);
		$qualification->setOrderId($order->id);
		$qualification->setQualityId($request->input('quality_id'));
		$qualification->setComment($request->input('comment'));
		$qualification->save();
		return redirect('/orders/purchases')->with('msg', 'La calificación fué realizada.');
	}

	public function qualifySeller(Request $request, Order $order) {
		$qualification = new Qualifyseller;
		$qualification->setUserId($order->customer_id);
		$qualification->setSellerId($order->seller_id);
		$qualification->setOrderId($order->id);
		$qualification->setQualityId($request->input('quality_id'));
		$qualification->setComment($request->input('comment'));
		$qualification->save();
		return redirect('/orders/purchases')->with('msg', 'La calificación fué realizada.');
	}

	public function qualifyCustomer(Request $request, Order $order) {
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
