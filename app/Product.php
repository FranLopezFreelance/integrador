<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [
		'user_id', 'name', 'description', 'section_id', 'brand_id', 'quantity', 'price', 'image'
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

	public function sales() {
		return $this->hasMany(Item::class );
	}

	public function qualifications() {
		return $this->hasMany(Qualifyproduct::class );
	}

	public function images() {
		return $this->hasMany(Image::class )->orderBy('order', 'asc');
	}

	public function setUserId($id) {
		$this->user_id = $id;
	}

}
