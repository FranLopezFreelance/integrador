<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $fillable = [
		'product_id', 'path', 'active', 'order'
	];

	/**
	 * Image belongs to Product.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function product() {
		return $this->belongsTo(Product::class );
	}
}
