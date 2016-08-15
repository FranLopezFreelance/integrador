<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Notification;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller {

	public function create(Request $request, Product $product) {

		$seller_id = $product->user_id;

		$q     = $request->input('quantity');
		$total = $product->price*$q;
		$order = new Order;
		$order->setCustomerId(Auth::user()->id);
		$order->setSellerId($seller_id);
		$order->setTotal($total);
		$order->save();
		$order->addItem($order, $product, $q);

		//Tomo el nombre de usuario para la notificacion
		$user = Auth::user()->name;

		//Tomo al "otro" usuario, que es qeu recibe la notificación
		$otherUser = User::find($seller_id);

		//URL a la la queredirecciona la notificacion
		$url = '/orders/sales';

		//Registro la notificacion
		$notification = new Notification([
				'user_id'       => $seller_id,
				'event_user_id' => Auth::user()->id,
				'event_id'      => 1,
				'status_id'     => 0,
				'url'           => $url,
			]);

		$notification->save();

		$notifications = $otherUser->notifications()->where('status_id', 0)->count();

		//ENVIO LA NOTIFICACION POR PUSHER
		event(new NotificationEvent(
				[
					'text'          => "$user te ha hecho una compra.",
					'user_id'       => $seller_id,
					'url'           => $url."/".$notification->id,
					'notifications' => $notifications, //Es La cantidad
				]));

		//Envio el email con la notificación
		Mail::send('emails.sale', compact('otherUser', 'user'), function ($m) use ($otherUser) {
				$m->from('info@naturalmarket.com.ar', 'Natural Market');

				$m->to($otherUser->email, $otherUser->name)->subject('Your Reminder!');
			});

		return redirect('/orders/purchases/')->with('msg', 'La Orden se generó correctamente.');
	}

	public function start(User $user) {

	}

	public function purchasesList() {
		$user      = Auth::user();
		$purchases = $user->purchases;
		return view('users.profile.purchases', compact('purchases', 'user'));
	}

	public function salesList() {
		$user  = Auth::user();
		$sales = $user->sales;
		return view('users.profile.sales', compact('sales'));
	}

	public function customerOK(Order $order) {

		$seller_id = $order->seller->id;

		$order->setCustomerOK(1);
		$order->save();

		//Tomo el nombre de usuario para la notificacion
		$user = Auth::user()->name;

		//Tomo al "otro" usuario, que es qeu recibe la notificación
		$otherUser = User::find($seller_id);

		//URL a la la queredirecciona la notificacion
		$url = '/orders/customerOKNotification';

		//Registro la notificacion
		$notification = new Notification([
				'user_id'       => $seller_id,
				'event_user_id' => Auth::user()->id,
				'event_id'      => 2,
				'status_id'     => 0,
				'url'           => $url,
			]);

		$notification->save();

		$notifications = $otherUser->notifications()->where('status_id', 0)->count();

		//ENVIO LA NOTIFICACION POR PUSHER
		event(new NotificationEvent(
				[
					'text'          => "$user confirmó una entrega.",
					'user_id'       => $seller_id,
					'url'           => $url."/".$notification->id,
					'notifications' => $notifications, //Es La cantidad
				]));

		return redirect('/orders/purchases/')->with('msg', 'Entrega Confirmada.');
	}

	public function sellerOK(Order $order) {

		$customer_id = $order->customer->id;

		$order->setSellerOK(1);
		$order->save();

		//Tomo el nombre de usuario para la notificacion
		$user = Auth::user()->name;

		//Tomo al "otro" usuario, que es qeu recibe la notificación
		$otherUser = User::find($customer_id);

		//URL a la la queredirecciona la notificacion
		$url = '/orders/sellerOKNotification';

		//Registro la notificacion
		$notification = new Notification([
				'user_id'       => $customer_id,
				'event_user_id' => Auth::user()->id,
				'event_id'      => 2,
				'status_id'     => 0,
				'url'           => $url,
			]);

		$notification->save();

		$notifications = $otherUser->notifications()->where('status_id', 0)->count();

		//ENVIO LA NOTIFICACION POR PUSHER
		event(new NotificationEvent(
				[
					'text'          => "$user confirmó una entrega.",
					'user_id'       => $customer_id,
					'url'           => $url."/".$notification->id,
					'notifications' => $notifications, //Es La cantidad
				]));

		return redirect('/orders/sales/')->with('msg', 'Entrega Confirmada.');
	}

	public function saleNotification($id) {
		$notification            = Notification::find($id);
		$notification->status_id = 1;
		$notification->save();

		$user  = Auth::user();
		$sales = $user->sales;
		return view('users.profile.sales', compact('sales'));
	}

	public function customerOKNotification($id) {
		$notification            = Notification::find($id);
		$notification->status_id = 1;
		$notification->save();

		$user  = Auth::user();
		$sales = $user->sales;
		return view('users.profile.sales', compact('sales'));
	}

	public function sellerOKNotification($id) {
		$notification            = Notification::find($id);
		$notification->status_id = 1;
		$notification->save();

		$user      = Auth::user();
		$purchases = $user->purchases;
		return view('users.profile.purchases', compact('purchases'));
	}
}
