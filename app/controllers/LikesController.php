<?php

use Larabook\Statuses\LeaveLikeOnStatusCommand;
use Larabook\Statuses\LeaveDislikeOnStatusCommand;
use Larabook\Statuses\Like;

class LikesController extends \BaseController {


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function store()
	{
		//fetch the input
		$input = array_add(Input::get(), 'user_id', Auth::id());

		//execute a command leave a comment on a status
		$this->execute(LeaveLikeOnStatusCommand::class, $input);

		//go back
		return Redirect::back();
	}

	/**
	 * Unliking status
	 */

	public function destroy($id){
		//execute a command leave a comment on a status
		$input['id'] = $id;

		//$this->execute(LeaveDislikeOnStatusCommand::class, $input);
		Like::destroy($id);
		return Redirect::back();

	}

}
