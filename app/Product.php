<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [
		'name', 'description', 'section_id', 'brand_id', 'quantity', 'price', 'image'
	];

	public function user() {
		return $this->belongsTo(User::class );
	}

	public function brand() {
		return $this->belongsTo(Brand::class );
	}

	public function section() {
		return $this->belongsTo(Section::class );
	}

	public function setUserId($id) {
		$this->user_id = $id;
	}
}
