<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller {

	public function update(User $user) {

		return view('users.update', compact('user'));
	}

	public function save(Request $request) {

		$user = new User($request->all());

		$user::where('id', $user->id)->update([
				'name'     => $user->name,
				'lastname' => $user->lastname,
				'email'    => $user->email,
				'city_id'  => $user->city_id,
				'avatar'   => $user->avatar
			]);

		return view('users.update', compact('user'));
	}
}
