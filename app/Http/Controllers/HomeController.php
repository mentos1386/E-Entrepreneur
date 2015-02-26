<?php namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate();

		return view('frontend.home', ['posts' => $posts]);
	}

}
