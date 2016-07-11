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
		Route::get('profile/{user}', 'UsersController@view');
		Route::get('update/{user}', 'UsersController@update');

		//PATCH METHOD
		Route::patch('update/{user}', 'UsersController@save');
	});

Route::group(['prefix' => 'products'], function () {
		//GET METHOD
		Route::get('create', 'PostController@create');
		Route::get('/', 'ProductsController@get');
		Route::get('list/user/{user}', 'ProductsController@listByUser');
		Route::get('list/branch/{branch}', 'ProductsController@listByBranch');
		Route::get('update', 'DashboardController@update');

		//POST METHOD
		Route::post('list/search/', 'ProductsController@listByParameter');
	});

Route::auth();

Route::get('/home', 'HomeController@index');
