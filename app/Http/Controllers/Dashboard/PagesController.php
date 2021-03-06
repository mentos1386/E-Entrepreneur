<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pagetypes;
use App\Services\PageService;
use App\User;
use Illuminate\Http\Request;
use App\Page;
use App\Role;
class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::with('pagetypes')->paginate();

		return view('dashboard.pages.index', ['pages' => $pages]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = Role::all();

		$users = User::all();

		$pagetypes = Pagetypes::all();

		return view('dashboard.pages.create', ['roles' => $roles, 'users' => $users, 'pagetypes' => $pagetypes]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$createPage = new PageService;

		$validator = $createPage->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createPage->create($request->all());

		return redirect(route('dashboard.pages.index'))
			->with('message_success', '<strong>Success!</strong> Page successfully created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$page = Page::with('user', 'role', 'pagetypes')->find($id);

		return view('dashboard.pages.show', ['page' => $page]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Page::with('role', 'user', 'pagetypes')->findOrFail($id);

		$roles = Role::all();

		$users = User::all();

		$pagetypes = Pagetypes::all();

		return view('dashboard.pages.edit', ['page' => $page, 'roles' => $roles, 'users' => $users, 'pagetypes' => $pagetypes]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$updatePage = new PageService;

		$validator = $updatePage->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$updatePage->update($request->all(), $id);

		return redirect(route('dashboard.pages.index'))
			->with('message_success', '<strong>Success!</strong> Page successfully updated!');
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
