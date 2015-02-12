<?php namespace TGL\Users\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Guard;
use TGL\Core\Http\Controllers\Controller;
use TGL\Members\Http\Requests\LoginRequest;
use TGL\Members\Http\Requests\RegisterRequest;
use TGL\Src\Commander\LaravelCommander;
use TGL\Src\Flash\Flash;
use TGL\Users\Commands\RegisterUserCommand;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * @var LaravelCommander
	 */
	protected $commander;

	/**
	 * @param Guard $auth
	 * @param LaravelCommander $commander
	 */
	public function __construct(Guard $auth, LaravelCommander $commander)
	{
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'getLogout']);
		$this->commander = $commander;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getSignUp()
	{
		return view('auth.sign-up');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param RegisterRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(RegisterRequest $request)
	{
		$member = $this->commander->dispatch(RegisterUserCommand::class, null, [
			'TGL\Members\Decorators\UsernameSlugGenerator'
		]);

		$this->auth->login($member);

		Flash::message('Thank you for signing up!');

		return redirect()->back();
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param LoginRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(LoginRequest $request)
	{
		$credentials = $request->only('username', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			Flash::message('You are now logged in!');

			return redirect()->back();
		}

		Flash::error('Invalid Credentials');

		return redirect()->back();
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		Flash::message('You have been logged out');

		return redirect()->route('sign.up');
	}

}
