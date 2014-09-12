<?php namespace Larabook\Users;

trait FollowableTrait {
	
	/**
	 * get the list of users that the current user follows
	 */

	public function followedUsers(){

		//namesto 'Larabook\Users\User' lahko uporabimo tudi self::class
		return $this->belongsToMany('Larabook\Users\User', 'follows', 'follower_id', 'followed_id')->withTimestamps();
	}

	/**
	 * Get the list of users who follow the current user
	 */

	public function followers(){

		return $this->belongsToMany('Larabook\Users\User', 'follows', 'followed_id', 'follower_id')->withTimestamps();
	}

	/**
	 *  Determine if current users follows another user
	 */

	public function isFollowedBy(User $otherUser){
		
		$idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

		return in_array($this->id, $idsWhoOtherUserFollows);
	}

}