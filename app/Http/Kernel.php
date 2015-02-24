<?php namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

	/**
	 * The application's global HTTP middleware stack.
	 *
	 * @var array
	 */
	protected $middleware = [
		'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'App\Http\Middleware\VerifyCsrfToken',
	];

	/**
	 * The application's route middleware.
	 *
	 * @var array
	 */
	protected $routeMiddleware = [
		'auth' => 'App\Http\Middleware\Authenticate',
		'auth.basic' => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
		'guest' => 'App\Http\Middleware\RedirectIfAuthenticated',

		// Permissions
		'perm' => 'App\Http\Middleware\Permissions\Permission',
		// Dashboard
		'perm.dashboard' => 'App\Http\Middleware\Permissions\Dashboard\Dashboard',
		// Blog
		'perm.dashboard.blog' => 'App\Http\Middleware\Permissions\Dashboard\Blog\Blog',
		'perm.dashboard.blog.posts' => 'App\Http\Middleware\Permissions\Dashboard\Blog\Blog_Posts',
		'perm.dashboard.blog.comments' => 'App\Http\Middleware\Permissions\Dashboard\Blog\Blog_Comments',
		// Statistics
		'perm.dashboard.statistics' => 'App\Http\Middleware\Permissions\Dashboard\Statistics\Statistics',
		// Store
		'perm.dashboard.store' => 'App\Http\Middleware\Permissions\Dashboard\Store\Store',
		'perm.dashboard.store.add' => 'App\Http\Middleware\Permissions\Dashboard\Store\Store_Add',
		'perm.dashboard.store.orders' => 'App\Http\Middleware\Permissions\Dashboard\Store\Store_Orders',
		// Users
		'perm.dashboard.users' => 'App\Http\Middleware\Permissions\Dashboard\Users\Users',
		// Appearance
		'perm.dashboard.appearance' => 'App\Http\Middleware\Permissions\Dashboard\Appearance\Appearance',
		// Pages
		'perm.dashboard.pages' => 'App\Http\Middleware\Permissions\Dashboard\Pages\Pages',
		// Settings_Tools
		'perm.dashboard.settings_tools' => 'App\Http\Middleware\Permissions\Dashboard\Settings_Tools\Settings_Tools',
	];

}
