<?php namespace Larabook\Registration\Events;

use Larabook\Users\User;

class UserRegistered {

	/**
	 * Put throuth things you'll need for event  
	**/

	public $user;

	function __construct(User $user){

		$this->user = $user;
	}

}