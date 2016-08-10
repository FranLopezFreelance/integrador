<?php

/*$pusher = new Pusher('fde4c913418bef9c7a8b', 'f372de6e86369b9aae85', 231061);

session(['pusher' => $pusher]);*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', 'HomeControllerNoAuth@home');
Route::get('/welcome', 'HomeController@welcome');

Route::group(['prefix' => 'users'], function () {
		//GET METHOD
		Route::get('myProfile', 'UsersController@myProfile');
		Route::get('profile/{user}', 'UsersController@profile');
		Route::get('update', 'UsersController@update')->middleware('web');
		Route::get('sellersList', 'UsersController@sellersList');
		Route::get('follow/{id}', 'UsersController@follow');
		Route::get('unfollow/{id}', 'UsersController@unFollow');
		Route::get('followingList', 'UsersController@followingList');
		Route::get('followersList', 'UsersController@followersList');
		//Para la confirmacion de la notificacion
		Route::get('followersList/{id}', 'UsersController@followersListNotification');

		//PATCH METHOD
		Route::patch('update/{user}', 'UsersController@save');
	});

Route::group(['prefix' => 'products'], function () {
		//GET METHOD
		Route::get('create', 'ProductsController@store');
		Route::get('list', 'ProductsController@getAll');
		Route::get('myList', 'ProductsController@getAllMyProducts');
		Route::get('list/user/{user}', 'ProductsController@listByUser');
		Route::get('detail/{product}', 'ProductsController@detail');
		Route::get('update/{product}', 'ProductsController@update');
		Route::get('buy/{product}', 'ProductsController@buy');

		//POST METHOD
		Route::post('list/search', 'ProductsController@listByParameter');
		Route::post('list/section', 'ProductsController@listBySection');
		Route::post('list/brand', 'ProductsController@listByBrand');
		Route::post('list/city', 'ProductsController@listByCity');
		Route::post('create', 'ProductsController@create');

		//PATCH METHOD
		Route::patch('update/{product}', 'ProductsController@save');

	});

Route::group(['prefix' => 'orders'], function () {
		//GET METHOD
		Route::get('purchases', 'OrdersController@purchasesList');
		Route::get('sales', 'OrdersController@salesList');
		Route::get('update/{order}', 'OrdersController@update');
		Route::get('customerOK/{order}', 'OrdersController@customerOK');
		Route::get('sellerOK/{order}', 'OrdersController@sellerOK');

		//Para la confirmacion de la notificacion
		Route::get('sales/{id}', 'OrdersController@saleNotification');
		Route::get('customerOKNotification/{id}', 'OrdersController@customerOKNotification');
		Route::get('sellerOKNotification/{id}', 'OrdersController@sellerOKNotification');

		//POST METHOD
		Route::post('create/{product}', 'OrdersController@create');

		//PATCH METHOD
		Route::patch('update/{order}', 'OrdersController@save');

	});

Route::group(['prefix' => 'qualifications'], function () {
		//GET METHOD
		Route::get('customer/{order}', 'QualificationsController@customer');
		Route::get('seller/{order}', 'QualificationsController@seller');
		Route::get('product/{order}', 'QualificationsController@product');

		//POST METHOD
		Route::post('customer/{order}', 'QualificationsController@qualifyCustomer');
		Route::post('seller/{order}', 'QualificationsController@qualifySeller');
		Route::post('product/{order}', 'QualificationsController@qualifyProduct');

		//PATCH METHOD
		Route::patch('update/{qualify}', 'OrdersController@save');

	});

Route::group(['prefix' => 'notifications'], function () {
		//GET METHOD
		Route::get('list', 'NotificationsController@listAll');

	});

Route::auth();