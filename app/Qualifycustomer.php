<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualifycustomer extends Model {

	public function user() {
		return $this->belongsTo(User::class );
	}

	public function quality() {
		return $this->belongsTo(Qualitycustomer::class );
	}

	public function setUserId($id) {
		$this->user_id = $id;
	}

	public function setCustomerId($id) {
		$this->customer_id = $id;
	}

	public function setOrderId($id) {
		$this->order_id = $id;
	}

	public function setQualityId($id) {
		$this->quality_id = $id;
	}

	public function setComment($comment) {
		$this->comment = $comment;
	}
}
