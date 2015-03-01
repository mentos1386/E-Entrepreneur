<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Role;
use App\Services\RoleService;

class RolesController extends Controller {

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
		$role = Role::with('user', 'permission')->findOrFail($id);

		return View('dashboard.users.roles.edit', ['role' => $role]);
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

		$createRole = new RoleService;

		$validator = $createRole->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$createRole->create($request->all());

		return redirect(route('dashboard.users.roles.index'))
			->with('message_success', '<strong>Success!</strong> Role successfully created!');

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

		$updateRole = new RoleService;

		$validator = $updateRole->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$updateRole->update($request->all(), $id);

		return redirect(route('dashboard.users.roles.index'))
			->with('message_success', '<strong>Success!</strong> Role successfully updated!');
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
