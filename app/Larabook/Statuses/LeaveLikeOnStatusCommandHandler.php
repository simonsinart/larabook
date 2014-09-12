<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Larabook\Statuses\StatusRepository;

class LeaveLikeOnStatusCommandHandler implements CommandHandler {

	protected $StatusRepository;

	public function __construct(StatusRepository $StatusRepository){

		$this->StatusRepository = $StatusRepository;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$comment = $this->StatusRepository->leaveLike($command->user_id, $command->status_id, $command->value);
    	return $comment;
    }

}