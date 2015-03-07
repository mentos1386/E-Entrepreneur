<?php namespace App\Http\Controllers;

use App\Post;
use App\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('tag', 'category', 'user')->orderBy('created_at', 'DEC')->paginate();

		return view('themes.' . App::first()->theme . '.home', ['posts' => $posts]);
	}

}
