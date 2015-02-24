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
Route::group(array('middleware' => 'perm.dashboard'), function()
{
	/*
	 * Dashboard
	 */
	Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'Dashboard\DashboardController@index'));

	/*
	 *  Store
	 *   -> Store Add
	 *   -> Store Orders
	 */
	Route::group(array('middleware' => 'perm.dashboard.store'), function()
	{
		// -> Store Add
		Route::group(array('middleware' => 'perm.dashboard.store.add'), function()
		{
			Route::resource('/dashboard/store/add', 'Dashboard\StoreController');
		});

		// -> Store Orders
		Route::group(array('middleware' => 'perm.store.orders'), function()
		{
			Route::resource('/dashboard/store/orders', 'Dashboard\StoreController');
		});

		// Store
		Route::resource('/dashboard/store', 'Dashboard\StoreController');
	});
	/*
	 * Statistics
	 */
	Route::group(array('middleware' => 'perm.dashboard.statistics'), function()
	{
		// Statistics
		Route::resource('/dashboard/statistics', 'Dashboard\StatisticsController');
	});
	/*
	 * Pages
	 */
	Route::group(array('middleware' => 'perm.dashboard.pages'), function()
	{
		// Pages
		Route::resource('/dashboard/pages', 'Dashboard\PagesController');
	});
	/*
	 *  Blog
	 * 	 -> Posts
	 * 	 -> Comments
	 */
	Route::group(array('middleware' => 'perm.dashboard.blog'), function()
	{
		// -> Posts
		Route::group(array('middleware' => 'perm.dashboard.blog.posts'), function()
		{
			Route::resource('/dashboard/blog/posts', 'Dashboard\PostController');
		});

		// -> Comments
		Route::group(array('middleware' => 'perm.dashboard.blog.comments'), function()
		{
			Route::resource('/dashboard/blog/comments', 'Dashboard\CommentController');
		});

		// Blog
		Route::resource('/dashboard/blog', 'Dashboard\BlogController');
	});

	/*
	 * Users
	 *  -> Roles
	 */
	Route::group(array('middleware' => 'perm.dashboard.users'), function()
	{
		// -> Roles
		Route::resource('/dashboard/users/roles', 'Dashboard\RolesController');

		// Users
		Route::resource('/dashboard/users', 'Dashboard\UsersController');
	});

	/*
	 * Appearance
	 */
	Route::group(array('middleware' => 'perm.dashboard.appearance'), function()
	{
		// Appearance
		Route::resource('/dashboard/appearance', 'Dashboard\AppearanceController');
	});

	/*
	 *  Settings
	 *
	 *  Tools
	 */
	Route::group(array('middleware' => 'perm.dashboard.settings_tools'), function()
	{
		// Settings
		Route::resource('/dashboard/settings', 'Dashboard\SettingsController');

		// Tools
		Route::resource('/dashboard/tools', 'Dashboard\ToolsController');
	});
});