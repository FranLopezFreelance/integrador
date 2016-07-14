<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	public function products() {
		return $this->hasOne(Order::class );
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
