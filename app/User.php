<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'lastname', 'email', 'password', 'typey_id', 'city_id', 'avatar'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function type() {

		return $this->belongsTo(Type::class );

	}

	public function products() {

		return $this->hasMany(Product::class );

	}

	public function city() {

		return $this->belongsTo(City::class );

	}
}
