<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public function user() {

		return $this->belongsTo(User::class );

	}

	public function brand() {

		return $this->belongsTo(Brand::class );

	}

	public function section() {

		return $this->belongsTo(Section::class );

	}
}
