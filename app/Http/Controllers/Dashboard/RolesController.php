<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

use App\Role;

use App\Services\CreateRole;

class RolesController extends Controller {

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
		$roles = Role::with('user')->paginate();

		return View('dashboard.users.roles.index', ['roles' => $roles]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::with('user','permission')->findOrFail($id);

		return View('dashboard.users.roles.show', ['role' => $role]);
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
	 * Show the form for creating the specified resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('dashboard.users.roles.create');
	}

	/**
	 * Store the specified resource in storage.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$createRole = new CreateRole;

		$validator = $createRole->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createRole->create($request->all());

		return redirect(route('dashboard.users.roles.index'))->with('message', 'SomeMessage');

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
