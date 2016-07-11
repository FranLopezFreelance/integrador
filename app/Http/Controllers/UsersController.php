<?php

namespace App\Http\Controllers;

use App\City;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

	public function view($id) {

		$user = User::find($id);
		return view('users.profile', compact('user'));
	}

	public function update(User $user) {

		$types  = Type::all();
		$cities = City::all();
		return view('users.update', compact('user', 'types', 'cities'));
	}

	public function save(Request $request, User $user) {

		$user->update($request->all());
		return back();
	}
}
