<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Comment;
use App\Tag;
use App\Categories;

use App\Services\CreatePost;
use Illuminate\Http\Request;

class PostController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * The create role implementation.
	 *
	 * @var CreateRole
	 */
	protected $createRole;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('comment')->paginate(15);

		return view('dashboard.blog.posts.index', ['posts' => $posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = Tag::all();

		$categories = Categories::all();

		return view('dashboard.blog.posts.create', ['tags' => $tags, 'categories' => $categories]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		//dd($request->all());

		$createPost = new CreatePost;

		$validator = $createPost->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createPost->create($request->all());

		return redirect(route('dashboard.blog.posts.index'))->with('message', 'Post successfully created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::with('comment', 'tag', 'category')->findOrFail($id);

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

		$tags = Tag::all();

		$categories = Categories::all();

		//dd($post->toArray(), $tags->toArray(), $categories->toArray());

		return view('dashboard.blog.posts.edit', ['post' => $post, 'tags' => $tags, 'categories' => $categories]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
