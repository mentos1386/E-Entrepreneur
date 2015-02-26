<?php namespace App\Http\Controllers\Dashboard;

use App\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\TagService;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::paginate();

		return view('dashboard.blog.tags.index', ['tags' => $tags]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('dashboard.blog.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param array Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$createTag = new TagService;

		$validator = $createTag->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createTag->create($request->all());

		return redirect(route('dashboard.blog.tags.index'))->with('message', 'SomeMessage');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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

		$tag = Tag::findOrFail($id);

		// TODO: Fix it!
		dd('NE DELA');
		$tag->post();

		$tag->delete();
	}

}
