<?php namespace Larabook\Users;

use Larabook\Users\User;

class UserRepository {

	/**
	 * Persist a user
	 */

	public function save(User $user){

		return $user->save();
	}

	/**
	 * Get a paginated list of all users
	 */

	public function getPaginated($howMany = 25){

		return User::Orderby('username','asc')->Paginate($howMany);
	}

	/**
	 * Fetch a user by their username
	 * @param $username
	 * @return mixed
	 */

	public function findByUsername($username){

		return User::with('statuses')->whereUsername($username)->first();
	}

	/**
	 * Find a user by their id
	 */

	public function findById($id){
		return User::findOrFail($id);
	}

	/**
	 * Follow a Larabook user
	 */

	public function follow($userIdToFollow, User $user){

		return $user->followedUsers()->attach($userIdToFollow);
	}

	/**
	 * Unfollow a Larabook user
	 */

	public function unfollow($userIdToUnfollow, User $user){

		return $user->followedUsers()->detach($userIdToUnfollow);
	}
}