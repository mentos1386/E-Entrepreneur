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
 *
 * Front end
 *
 */

/*
 * Posts
 */
Route::resource('/post', 'Frontend\PostsController', ['only' => ['index', 'show']]);



/*
 *
 * Restricted access [Dashboard]
 *
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
	 * 	   -> Tags
	 *     -> Categories
	 * 	 -> Comments
	 */
	Route::group(array('middleware' => 'perm.dashboard.blog'), function()
	{
		// -> Posts
		Route::group(array('middleware' => 'perm.dashboard.blog.posts'), function()
		{
			// Posts
			Route::resource('/dashboard/blog/posts', 'Dashboard\PostController');
			Route::get('/dashboard/blog/posts/{id}/delete', 'Dashboard\PostController@destroy');
			// Tags
			Route::resource('/dashboard/blog/tags', 'Dashboard\TagsController');
			Route::get('/dashboard/blog/tags/{id}/delete', 'Dashboard\TagsController@destroy');
			// Categories
			Route::resource('/dashboard/blog/categories', 'Dashboard\CategoriesController');
			Route::get('/dashboard/blog/categories/{id}/delete', 'Dashboard\CategoriesController@destroy');

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
	Route::group(array('middleware' => 'perm.dashboard.settings'), function()
	{
		// Settings
		Route::resource('/dashboard/settings', 'Dashboard\SettingsController');

	});
});