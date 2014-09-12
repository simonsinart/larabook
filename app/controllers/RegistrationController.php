<?php

use Larabook\Core\CommandBus;
use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;

class RegistrationController extends BaseController {
	
	private $registrationForm;

	function __construct(RegistrationForm $registrationForm){
		$this->registrationForm = $registrationForm;
		$this->beforeFilter('guest');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		return View::make('registration.create');
	}

	/**
	 * Create a new Larabook user
     *
	 * @return string
	 */
	public function store(){

		 $this->registrationForm->validate(Input::all());

		// extract(Input::only('username','email','password'));
		// $command = new RegisterUserCommand($username, $email, $password);

		// $user = $this->execute($command);

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay('Bro, I know you are now our member, but, do yo even lift? How can I sell you a membership to someone without muscle?');

		return Redirect::home();
	}

}
