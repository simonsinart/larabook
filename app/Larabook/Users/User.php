<?php

namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent, Hash;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Users\FollowableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

	protected $fillable = ['username','email','password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Path to the presenter for a user
	 * @var string
	 */

	protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/** 
	*	Passwords must always be hashed
	*	Overriding how we set a password
	**/

	public function setPasswordAttribute($password){

		$this->attributes['password'] = Hash::make($password);
	}

	/** 
	*	Relationship with statuses
	**/

	public function statuses(){
		return $this->hasMany('Larabook\Statuses\Status')->latest();
	}

	public static function register($username, $email, $password){
		
		$user = new static(compact('username','email','password'));

		$user->raise(new UserRegistered($user));

		return $user;	
	}

	/**
	 * Determine if the given user is the same as the current one
	 */

	public function is($user){

		if(is_null($user)) return false;

		return $this->username == $user->username;
	}

	/**
	 *	 
	 * Comments for status
	 */

	public function comments(){

		return $this->hasMany('Larabook\Statuses\Comment');
	}

}
