<?php

namespace App\Http\Controllers;

use App\City;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

	public function viewMy() {
		$user = Auth::user();
		return view('users.myProfile', compact('user'));
	}

	public function view(User $user) {

		return view('users.profile', compact('user'));
	}

	public function update() {
		$user   = Auth::user();
		$types  = Type::all();
		$cities = City::all();
		return view('users.update', compact('user', 'types', 'cities'));
	}

	public function save(Request $request, User $user) {

		$user->update($request->all());
		return back()->with('msg', 'Los datos se modificaron correctamente.');
	}
}
