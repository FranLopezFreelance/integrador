<?php

namespace App\Http\Controllers;

use App\Order;
use App\Qualitycustomer;
use App\Qualityproduct;
use App\Qualityseller;

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
}
