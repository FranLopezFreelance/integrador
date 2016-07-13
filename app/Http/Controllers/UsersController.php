<?php

namespace App\Http\Controllers;

use App\City;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {

	public function myProfile() {
		$user = Auth::user();
		return view('users.myProfile', compact('user'));
	}

	public function profile(User $user) {
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

	public function sellersList() {
		$users     = User::where('type_id', 2)->get();
		$following = Auth::user()->following;
		return view('users.sellersList', compact('users', 'following'));
	}

	public function follow($id) {
		Auth::user()->following()->attach(['following_id' => $id]);
		return back();
	}

	public function unFollow($id) {
		Auth::user()->following()->detach(['following_id' => $id]);
		return back();
	}

	public function followingList() {
		$users = Auth::user()->following;
		return view('users.followingList', compact('users'));
	}

	public function followersList() {
		$users = Auth::user()->followers;
		return view('users.followersList', compact('users'));
	}

}
