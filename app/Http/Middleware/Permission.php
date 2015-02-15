<?php namespace App\Http\Middleware;

use Closure;

use App\Role;
use Illuminate\Support\Facades\Auth;

class Permission extends Authenticate {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest(Route('login'))->with('authenticate',trans('redirect.authenticate'));
			}
		}

		// Check if user has requierd permission
		if ($this->check_perm($request))
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return response('Not enough permission', 401);
			}
		}

		return $next($request);
	}

	private function check_perm($request){

		/*
		 *  Make Logic to check if user has Permission!
		 *
		 *  Return True/False
		 */

		$user = Auth::user();

		$permissions = Role::find($user['role_id'])->permission;

		dump($permissions);

	}
}
