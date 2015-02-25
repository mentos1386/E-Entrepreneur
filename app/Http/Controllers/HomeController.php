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
		$posts = Post::with('comment')->paginate();

		return view('frontend.home', ['posts' => $posts]);
	}

}
