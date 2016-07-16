<?php

namespace App;

use App\Item;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $fillable = [
		'customer_id', 'seller_id', 'state', 'total'
	];

	public function customer() {
		return $this->belongsTo(User::class , 'customer_id');
	}

	public function seller() {
		return $this->belongsTo(User::class , 'seller_id');
	}

	public function items() {
		return $this->hasMany(Item::class );
	}

	public function qualifyProducts() {
		return $this->hasMany(Qualifyproduct::class );
	}

	public function qualifySeller() {
		return $this->hasOne(Qualifyseller::class );
	}

	public function qualifyCustomer() {
		return $this->hasOne(Qualifycustomer::class );
	}

	public function setCustomerId($id) {
		$this->customer_id = $id;
	}

	public function setSellerId($id) {
		$this->seller_id = $id;
	}

	public function setState($state) {
		$this->state = $state;
	}

	public function setTotal($total) {
		$this->total = $total;
	}

	public function setCustomerOK($value) {
		$this->customer_ok = $value;
	}

	public function setSellerOK($value) {
		$this->seller_ok = $value;
	}

	public function addItem(Order $order, Product $product, $quantity) {
		$item = new Item();
		$item->setOrderId($order->id);
		$item->setProductId($product->id);
		$item->setQuantity($quantity);
		$item->setPrice($product->price);
		$item->save();
	}
}
