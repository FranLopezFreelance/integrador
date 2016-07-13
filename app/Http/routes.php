<?php

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

Route::get('/', function () {
		return view('welcome');
	});

Route::group(['prefix' => 'users'], function () {
		//GET METHOD
		Route::get('myProfile', 'UsersController@myProfile');
		Route::get('profile/{user}', 'UsersController@profile');
		Route::get('update', 'UsersController@update');
		Route::get('sellersList', 'UsersController@sellersList');
		Route::get('follow/{id}', 'UsersController@follow');
		Route::get('unfollow/{id}', 'UsersController@unfollow');
		Route::get('followingList', 'UsersController@followingList');
		Route::get('followersList', 'UsersController@followersList');

		//PATCH METHOD
		Route::patch('update/{user}', 'UsersController@save');
	});

Route::group(['prefix' => 'products'], function () {
		//GET METHOD
		Route::get('create', 'ProductsController@store');
		Route::get('list', 'ProductsController@getAll');
		Route::get('myList', 'ProductsController@getAllMyProducts');
		Route::get('list/user/{user}', 'ProductsController@listByUser');
		Route::post('list/section', 'ProductsController@listBySection');
		Route::post('list/brand', 'ProductsController@listByBrand');
		Route::post('list/city', 'ProductsController@listByCity');
		Route::get('detail/{product}', 'ProductsController@detail');
		Route::get('update/{product}', 'ProductsController@update');

		//POST METHOD
		Route::post('list/search', 'ProductsController@listByParameter');
		Route::post('create', 'ProductsController@create');

		//PATCH METHOD
		Route::patch('update/{product}', 'ProductsController@save');

	});

Route::auth();

Route::get('/home', 'HomeController@index');
