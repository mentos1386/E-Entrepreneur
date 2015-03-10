<?php namespace App\Http\Controllers\Frontend;

use App\Link;
use App\Menu;
use App\Post;
use App\App;
use App\Http\Controllers\Controller;
use App\Themedata;

class HomeController extends Controller {

	/**
	 * Show front page
	 *
	 * @return Response
	 */
	public function index()
	{

		$posts = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate();

		$items = Themedata::all();

		return view('themes.' . App::first()->theme . '.frontend.frontpage.home', ['posts' => $posts, 'items' => $items]);
	}

}
