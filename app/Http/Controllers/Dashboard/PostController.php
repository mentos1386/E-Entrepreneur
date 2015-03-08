<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Comment;
use App\Role;
use App\Tag;
use App\Categories;

use App\Services\PostService;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('comment', 'user')->paginate(15);

		return view('dashboard.blog.posts.index', ['posts' => $posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::all();

		$tags = Tag::all();

		$categories = Categories::all();

		return view('dashboard.blog.posts.create', ['tags' => $tags, 'categories' => $categories, 'users' => $users]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$createPost = new PostService;

		$validator = $createPost->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createPost->create($request->all());

		return redirect(route('dashboard.blog.posts.index'))
			->with('message_success', '<strong>Success!</strong> Post successfully created!');
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

		return view('dashboard.blog.posts.show', ['post' => $post]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::with('tag', 'category')->findOrFail($id);

		$users = User::all();

		$tags = Tag::all();

		$categories = Categories::all();


		return view('dashboard.blog.posts.edit', ['post' => $post, 'tags' => $tags, 'categories' => $categories, 'users' => $users]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param array Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$updatePost = new PostService;

		$validator = $updatePost->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$updatePost->update($request->all(), $id);

		return redirect(route('dashboard.blog.posts.index'))
			->with('message_success', '<strong>Success!</strong> Post successfully updated!');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$post = Post::findOrFail($id);

		$post->tag()->detach();
		$post->category()->detach();

		$post->delete();

		return redirect(route('dashboard.blog.posts.index'))->with('message', 'Post successfully deleted!');
	}

}
