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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::controllers([ ## REMOVE IN FUTURE!
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);

Route::get('/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);

# LOGIN FILTER
Route::group(array('middleware' => 'auth'), function()
{

	###############################
	# DASHBOARD
	Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'Dashboard\DashboardController@index'));

	###############################
	# USERS
	Route::get('/dashboard/users', array('as' => 'users', 'uses' => 'Dashboard\UsersController@index'));

	###############################
	# Settings
	Route::get('dashboard/settings', function(){
		return Redirect::route('dashboard.settings.account.index');
	});

	# Account
	Route::resource('dashboard/settings/account', 'AccountController', ['only' => ['index', 'update']]);


	###############################
	# User
	Route::get('users/delete', array('as' => 'users.delete', 'uses' => 'UsersController@delete'));

	Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

});