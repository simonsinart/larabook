<?php namespace Larabook\Statuses;

use Laracasts\Commander\Events\EventGenerator;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Presenter\PresentableTrait;

use Eloquent;

class Status extends Eloquent  {

	use EventGenerator, PresentableTrait;
	
	/*
	 * Fillable fields for new status
	 */
	
	protected $fillable = ['body'];

	/**
	 * Path to the presenter for a status
	 * @var string
	 */

	protected $presenter = 'Larabook\Statuses\StatusPresenter'; 

	/*
	 * Publish a new status
	 */

	public static function publish($body){

		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($body));

		return $status;
	}

	/** 
	*	Status belongs to users
	**/

	public function user(){
		return $this->belongsTo('Larabook\Users\User');
	}

	/**
	 * Relationship between comments and status
	 */

	public function comments(){
		return $this->hasMany('Larabook\Statuses\Comment');
	}

	public function likes(){
		return $this->hasMany('Larabook\Statuses\Like');
	}

	public function isLikedByUser($currentUser){
		return $this->likes()->whereUserId($currentUser->id)->first();
	}

}