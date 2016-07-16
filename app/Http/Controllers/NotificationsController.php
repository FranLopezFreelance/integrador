<?php

namespace App\Http\Controllers;

use App\Notification;

use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller {

	public function listAll() {
		$notifications = Notification::where('user_id', Auth::user()->id)->get();
		return view('notifications.list', compact('notifications'));
	}
}
