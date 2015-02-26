<?php namespace App\Http\Controllers\Dashboard;

use App\Categories;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Categories::paginate();

		return view('dashboard.blog.categories.index', ['categories' => $categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Categories::all();

		return view('dashboard.blog.categories.create', ['categories' => $categories]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param array Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$createCategory = new CategoryService;

		$validator = $createCategory->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createCategory->create($request->all());

		return redirect(route('dashboard.blog.categories.index'))->with('message', 'SomeMessage');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Categories::with('post', 'post.user')->findOrFail($id);

		return view('dashboard.blog.categories.show', ['category' => $category]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Categories::findOrFail($id);

		$categories = Categories::all();

		return view('dashboard.blog.categories.edit', ['category' => $category, 'categories' => $categories]);
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
