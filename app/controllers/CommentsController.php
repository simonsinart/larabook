<?php

use Laracasts\Commander\CommanderTrait;
use Larabook\Statuses\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController {

	use CommanderTrait;
	/**
	 * Leave new comment.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch the input
		$input = array_add(Input::get(), 'user_id', Auth::id());

		//execute a command leave a comment on a status
		$this->execute(LeaveCommentOnStatusCommand::class, $input);

		//go back
		return Redirect::back();
	}

}