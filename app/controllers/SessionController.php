<?php

use Larabook\Forms\SignInForm;

class SessionController extends \BaseController {

	private $signInForm;

	function __construct(SignInForm $signInForm){

		$this->beforeFilter('guest', ['except' => 'destroy']);
		$this->signInForm = $signInForm; 
	}

	/**x
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('statuses.index');
	}


	/**
	 * Show the form to login
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::only('email','password');
		
		$this->signInForm->validate($input);
		
		if(! Auth::attempt($input)){

			Flash::message('Banda! Ne damo ti dostopa!');

			return Redirect::back()->withInput();
		}

		Flash::message('Welcome back!');
		return Redirect::intended('statuses');

	}

	public function destroy(){

		Auth::logout();

		Flash::message("You're successfully logout");

		return Redirect::home();
	}

}
