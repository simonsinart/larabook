<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;


class FollowUserCommandHandler implements CommandHandler{

	public $userRepo;

	function __construct(UserRepository $userRepo){
		$this->userRepo = $userRepo;
	}

	public function handle($command){

		$user = $this->userRepo->findById($command->userId);

		$this->userRepo->follow($command->userIdToFollow, $user);

		return $user;
	}
}