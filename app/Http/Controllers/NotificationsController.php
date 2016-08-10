<?php

namespace App\Http\Controllers;

use App\Notification;

use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller {

	public function listAll() {
		$notifications = Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
		return view('notifications.list', compact('notifications'));
	}
}
