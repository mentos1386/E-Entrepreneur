<?php


/*
 * User Login/Register and Logout
 */
Route::controllers([
	'auth'     => 'Frontend\AuthController',
	'password' => 'Frontend\PasswordController',
]);
Route::get('/login', ['as' => 'login', 'uses' => 'Frontend\AuthController@getLogin']);
Route::get('/register', ['as' => 'register', 'uses' => 'Frontend\AuthController@getRegister']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Frontend\AuthController@getLogout']);

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
	 *  -> Menus
	 *  -> Front Page
	 */
	Route::group(array('middleware' => 'perm.dashboard.appearance'), function()
	{
		// -> Menus
		Route::resource('/dashboard/appearance/menus', 'Dashboard\MenusController');
		Route::get('/dashboard/appearance/menus/{id}/delete', ['as' => 'dashboard.appearance.menus.destroy', 'uses' => 'Dashboard\MenusController@destroy']);
		// -> Front Page
		Route::get(
			'/dashboard/appearance/frontpage/create/{name}',
			['as' => 'dashboard.appearance.frontpage.create', 'uses' => 'Dashboard\FrontPageController@create']
		);
		Route::get(
			'/dashboard/appearance/frontpage/select/{name}',
			['as' => 'dashboard.appearance.frontpage.select', 'uses' => 'Dashboard\FrontPageController@select']
		);
		Route::resource('/dashboard/appearance/frontpage', 'Dashboard\FrontPageController');

		// Appearance
		Route::resource('/dashboard/appearance', 'Dashboard\AppearanceController');
		// Themes
		Route::resource('/dashboard/appearance/themes', 'Dashboard\ThemesController');
		Route::get('/dashboard/appearance/themes/{theme_name}/set', 'Dashboard\ThemesController@set');


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

/*
 *
 * Front end [Everything Else]
 *
 */
/*
 * Front page
 */
Route::get('/', ['as' => 'home', 'uses' => 'Frontend\HomeController@index']);
Route::post('/search/{query}', ['as' => 'search', 'uses' => 'Frontend\HomeController@search']);

/*
 * Posts & Comments
 */
Route::resource('/post', 'Frontend\PostsController', ['only' => ['index', 'show']]);
Route::post('/comments', ['as' => 'comments.post', 'uses' => 'Frontend\CommentsController@store']);

/*
 * Store & Reviews
 */
Route::get('/store', ['as' => 'store.index', 'uses' => 'Frontend\StoreController@index']);
Route::get('/store/cart', ['as' => 'store.cart', 'uses' => 'Frontend\StoreController@cart']);
Route::get('/store/cart/add/{id}', ['as' => 'store.cart.add', 'uses' => 'Frontend\StoreController@cartAdd']);
Route::get('/store/cart/remove/{id}', ['as' => 'store.cart.remove', 'uses' => 'Frontend\StoreController@cartRemove']);
Route::post('/store/search/', ['as' => 'store.search', 'uses' => 'Frontend\StoreController@search']);
Route::get('/store/{id}', ['as' => 'store.show', 'uses' => 'Frontend\StoreController@show']);
Route::get('/store/category/{id}', ['as' => 'store.category.index', 'uses' => 'Frontend\StoreController@category']);
Route::post('/reviews', ['as' => 'reviews.post', 'uses' => 'Frontend\ReviewsController@store']);

/*
 * Tags & Categories
 */
Route::get('/tags', 'Frontend\TagsController@index');
Route::get('/tag/{id}', 'Frontend\TagsController@show');
Route::get('/categories', 'Frontend\CategoriesController@index');
Route::get('/category/{id}', 'Frontend\CategoriesController@show');

/*
 * Pages
 */
Route::get('/{url}', 'Frontend\PagesController@show');
Route::get('/page/password/{id}', ['as' => 'page.password', 'uses' => 'Frontend\PagesController@password']);
Route::post('/page/password/{id}', ['as' => 'page.password.check', 'uses' => 'Frontend\PagesController@password_check']);


