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

		// TODO: IT Should be somehow figured out, if theme needs DEC or ASC, and get ONLY that from DB
		$posts_dec = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate();
		$posts_asc = Post::with('tag', 'category', 'user')->orderBy('created_at', 'ASC')->paginate();

		$items = Themedata::all();

		return view('themes.' . App::first()->theme . '.frontend.frontpage.home', ['posts_dec' => $posts_dec, 'posts_asc' => $posts_asc, 'items' => $items]);
	}

}
