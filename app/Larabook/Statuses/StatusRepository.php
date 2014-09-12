<?php namespace Larabook\Statuses;

use Larabook\Users\User;
use Larabook\Statuses\Status;
use Larabook\Statuses\Like;

class StatusRepository {

	public function getAllForUserId(User $user){

		return $user->statuses()->latest()->get();

	}

	/** 
	  *	Save a new status for a user
	  *  
	  **/

	public function save(Status $status, $userId){

		return User::findOrFail($userId)->statuses()->save($status);
	}

	public function leaveComment($userId, $statusId, $body){

		$comment = Comment::leave($body, $statusId);

		User::findOrFail($userId)->comments()->save($comment);

		return $comment;
	}

	public function leaveLike($userId, $statusId, $value){

		$comment = Like::leaveLike($value, $statusId);

		User::findOrFail($userId)->comments()->save($comment);

		return $comment;
	}

	public function leaveDislike($likeId){
		$like = Like::findOrFail($likeId)->get();
		$like->delete();

		return $like;
	}



	/**
	 * Get the feed for the user
	 *
	 */

	public function getFeedForUser(User $user){

		$userIds = $user->followedUsers()->lists('followed_id');
		$userIds[] = $user->id;

		return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
	}
}