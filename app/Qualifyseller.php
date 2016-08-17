<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualifyseller extends Model {

	public function user() {
		return $this->belongsTo(User::class );
	}

	public function quality() {
		return $this->belongsTo(Qualityseller::class );
	}

	public function setUserId($id) {
		$this->user_id = $id;
	}

	public function setSellerId($id) {
		$this->seller_id = $id;
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
