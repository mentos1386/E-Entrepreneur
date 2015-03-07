<?php namespace App\Http\Controllers\Frontend;

use App\Helpers\Themes;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param null $token
	 * @return Response
	 * @throws NotFoundHttpException
	 */
	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return Themes::view('auth.reset')->with('token', $token);
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
	}

	/**
	 * Display the form to request a password reset link.
	 *
	 * @return Response
	 */
	public function getEmail()
	{
		return Themes::view('auth.password');
	}

}
