<?php namespace App\Http\Middleware\Permissions;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Permission {
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

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

		// Check if user has required permission
		if ( ! $this->check_perm($request))
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

	// Database check thing
	public function check_perm(){
	}

}
