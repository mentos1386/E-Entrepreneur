<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::controllers([ ## REMOVE IN FUTURE!
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
 * User Login/Register and Logout
 */
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::get('/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


/*
 * Restricted access
 */
Route::group(array('middleware' => 'auth'), function()
{
	###############################
	# DASHBOARD
	Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'Dashboard\DashboardController@index'));

	###############################
	# STORE
	Route::resource('/dashboard/store', 'Dashboard\StoreController');

	###############################
	# PAGES
	Route::resource('/dashboard/pages', 'Dashboard\PagesController');

	###############################
	# BLOG
	Route::resource('/dashboard/blog', 'Dashboard\BlogController');

	###############################
	# USERS
	Route::resource('/dashboard/users', 'Dashboard\UsersController');

	###############################
	# APPEARANCE
	Route::resource('/dashboard/appearance', 'Dashboard\AppearanceController');

	###############################
	# SETTINGS
	Route::resource('/dashboard/settings', 'Dashboard\SettingsController');

	###############################
	# TOOLS
	Route::resource('/dashboard/tools', 'Dashboard\ToolsController');
});