<?php

namespace App;

use App\City;

use App\Product;
use App\Type;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'lastname', 'email', 'password', 'type_id', 'city_id', 'avatar'
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

	public function following() {
		return $this->belongsToMany(User::class , 'followings', 'user_id', 'following_id');
	}

	public function followers() {
		return $this->belongsToMany(User::class , 'followings', 'following_id', 'user_id');
	}

	public function purchases() {
		return $this->belongsToMany(User::class , 'orders', 'id', 'seller_id');
	}

	public function sales() {
		return $this->belongsToMany(User::class , 'orders', 'id', 'seller_id');
	}

}
