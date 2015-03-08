<?php namespace App\Http\Controllers\Frontend;

use App\Link;
use App\Menu;
use App\Post;
use App\App;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

	/**
	 * Show front page
	 *
	 * @return Response
	 */
	public function index()
	{
		dd(json_encode($page_types = [
			[
				'name'        => 'Default',
				'description' => 'Default page view',
				'dashboard'   => 'default',
				'view'        => 'default',
			],
			[
				'name'        => 'About',
				'description' => 'Page view designed for About pages',
				'dashboard'   => 'default',
				'view'        => 'about',
			],
			[
				'name'        => 'Location',
				'description' => 'Page designed to show maps',
				'dashboard'   => 'layouts.dashboard.location',
				'view'        => 'location',
			],
		]));

		$menus = Menu::with('links')->get();

		$posts = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate();

		return view('themes.' . App::first()->theme . '.home', ['posts' => $posts, 'menus' => $menus]);
	}

}
