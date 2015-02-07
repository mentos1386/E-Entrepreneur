<?php namespace App\Services;

use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		// Find the default Role, and assign user to that role!
		$default_role = DB::table('roles')->where('default', true)->pluck('id');

		return User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'role_id' => $default_role
		]);
	}

}
