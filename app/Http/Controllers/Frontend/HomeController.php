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
		$menus = Menu::with('links')->get();

		$posts = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate();

		return view('themes.' . App::first()->theme . '.home', ['posts' => $posts, 'menus' => $menus]);
	}

}
