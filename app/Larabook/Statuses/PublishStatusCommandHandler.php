<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Larabook\Statuses\Status;
use Larabook\Statuses\StatusRepository;
use Laracasts\Commander\Events\DispatchableTrait;


//implements command handler -> we are sure that we implemented handle method

class PublishStatusCommandHandler implements CommandHandler {

	use DispatchableTrait;

	protected $statusRepository;

	function __construct(StatusRepository $statusRepository){

		$this->statusRepository = $statusRepository;

	}


	public function handle($command){

		$status = Status::publish($command->body);

		$status = $this->statusRepository->save($status, $command->userId);

		$this->dispatchEventsFor($status);

		return $status;
	}
}