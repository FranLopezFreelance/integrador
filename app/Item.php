<?php

namespace App;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	public function order() {
		return $this->hasOne(Order::class );
	}

	public function product() {
		return $this->belongsTo(Product::class );
	}

	public function setOrderId($id) {
		$this->order_id = $id;
	}

	public function setProductId($id) {
		$this->product_id = $id;
	}

	public function setQuantity($q) {
		$this->quantity = $q;
	}

	public function setPrice($price) {
		$this->subtotal = $this->quantity*$price;
		$this->price    = $price;
	}

}
