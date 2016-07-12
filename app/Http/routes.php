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
		Route::get('myProfile', 'UsersController@viewMy');
		Route::get('profile/{user}', 'UsersController@view');
		Route::get('update', 'UsersController@update');

		//PATCH METHOD
		Route::patch('update/{user}', 'UsersController@save');
	});

Route::group(['prefix' => 'products'], function () {
		//GET METHOD
		Route::get('create', 'ProductsController@store');
		Route::get('list', 'ProductsController@getAll');
		Route::get('myList', 'ProductsController@getAllMy');
		Route::get('list/user/{user}', 'ProductsController@listByUser');
		Route::get('list/section/{section}', 'ProductsController@listBySection');
		Route::get('list/branch/{branch}', 'ProductsController@listByBranch');
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
