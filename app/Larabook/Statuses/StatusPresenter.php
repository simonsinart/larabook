<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter {

	/**
	 * Display how long it's been since the pubish date
	 * @return mixed
	 */

	public function timeSincePublished(){

		return $this->created_at->diffForHumans();
	}


    public function likeCount(){
        $count = $this->entity->likes->count();
        $plural = str_plural('Like', $count);

        $count = $this->entity->likes()->count();

        return $count > 0 ? $count ." people like it." : "Nobody cares."; 

    }

}