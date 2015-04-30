<?php namespace App\Http\Controllers\Frontend;

use App\Helpers\Themes;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Permissions\Dashboard\Dashboard as Dashboard;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {


	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @param  \App\Http\Middleware\Permissions\Dashboard\Dashboard $dashboard
	 */
    public function __construct(Guard $auth, Registrar $registrar, Dashboard $dashboard)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
        $this->dashboard = $dashboard;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return Themes::view('.auth.login');
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return Themes::view('.auth.register');
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
	}

    /**
     *  Redirect after login
     *    If Successfully
     *
     * @return string
     */
    public function redirectPath()
    {
        if ($this->dashboard->check_perm()) {
            $redirect = '/dashboard/';
        } else {
            $redirect = '/';
        }

        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : $redirect;

    }
}
