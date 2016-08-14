<?php

namespace App\Http\Controllers;

use App\City;
use App\Event;
use App\Events\NotificationEvent;
use App\Notification;

use App\Type;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller {

	public function myProfile() {
		$user = Auth::user();
		return view('users.profile.data', compact('user'));
	}

	public function profile(User $user) {
		return view('users.profile', compact('user'));
	}

	public function update() {
		$user   = Auth::user();
		$types  = Type::all();
		$cities = City::all();
		return view('users.profile.update', compact('user', 'types', 'cities'));
	}

	public function save(Request $request, User $user) {
		$user->update($request->except('avatar'));
		return back()->with('msg', 'Los datos se modificaron correctamente.');
	}

	public function sellersList() {
		$users     = User::where('type_id', 2)->paginate(12);
		$following = (Auth::user())?Auth::user()->following:'';
		return view('users.sellersList', compact('users', 'following'));
	}

	public function follow($id) {
		Auth::user()->following()->attach(['following_id' => $id]);

		//Tomo el nombre de usuario para la notificacion
		$user = Auth::user()->name;

		//Tomo al "otro" usuario, que es el que recibe la notificación
		$otherUser = User::find($id);

		//URL a la la queredirecciona la notificacion
		$url = '/users/followersList';

		//Registro la notificacion
		$notification = new Notification([
				'user_id'       => $id,
				'event_user_id' => Auth::user()->id,
				'event_id'      => 5,
				'status_id'     => 0,
				'url'           => $url,
			]);

		$notification->save();

		$notifications = $otherUser->notifications()->where('status_id', 0)->count();

		//ENVIO LA NOTIFICACION POR PUSHER
		event(new NotificationEvent(
				[
					'text'          => "$user te está siguiendo.",
					'user_id'       => $id,
					'url'           => $url."/".$notification->id,
					'notifications' => $notifications,
				]));

		//Retorno la nueva cantidad de seguidores para refrescarlo
		$newFollowers = $otherUser->followers()->count();

		//Envio el email con la notificación
		Mail::send('emails.follow', compact('otherUser', 'user'), function ($m) use ($otherUser) {
				$m->from('info@naturalmarket.com.ar', 'Natural Market');

				$m->to($otherUser->email, $otherUser->name)->subject('Your Reminder!');
			});

		return response()->json(['followers' => $newFollowers]);
	}

	public function unFollow($id) {

		Auth::user()->following()->detach(['following_id' => $id]);

		//Tomo al "otro" usuario
		$otherUser = User::find($id);

		//Retorno la nueva cantidad de seguidores para refrescarlo
		$newFollowers = $otherUser->followers()->count();
		return response()->json(['followers' => $newFollowers]);
	}

	public function followingList() {
		$users = Auth::user()->following;
		return view('users.profile.followingList', compact('users'));
	}

	public function followersList() {
		$users = Auth::user()->followers;
		return view('users.profile.followersList', compact('users'));
	}

	public function followersListNotification($id) {
		$notification            = Notification::find($id);
		$notification->status_id = 1;
		$notification->save();
		$users = Auth::user()->followers;

		return view('users.profile.followersList', compact('users'));
	}

	public function imageChange(Request $request) {

		if ($request->hasFile('image-profile')) {

			$user = Auth::user();

			$file = $request->file('image-profile');
			$name = $file->getClientOriginalExtension();

			$path = 'images/users/'.$user->id;

			$file->move($path, $name);

			$user->avatar = $path.'/'.$name;
			$user->save();

			return back()->with('msg', 'La imágen de Perfil se actualizó correctamente.');
		} else {
			return back()->with('msg-error', 'No se ha seleccionado ninguna imágen');
		}

	}

	public function changeType() {
		$user          = Auth::user();
		$user->type_id = 2;
		$user->save();

		return back()->with('msg', 'Muy bien! Ya tienes perfil de Vendedor.');
	}

	public function destroy() {
		$user = User::find(Auth::user()->id);
		$user->delete();
		return redirect('/logout');
	}

}