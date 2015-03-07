<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\Themes;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::with('comment', 'tag', 'category', 'user')->findOrFail($id);

		return Themes::view('.post.show', ['post' => $post]);
	}


}
