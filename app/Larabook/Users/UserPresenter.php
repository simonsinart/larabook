<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

	/**
	 * Present a link to the user's gravatar
	 * @return string
	 */

    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }

    public function followerCount(){

    	// razlika med followers() in followers je ta, da ce potrebujes query samo za prestet entitete, potem uporabi followers()
    	$count = $this->entity->followers()->count();
    	$plural = str_plural('Follower', $count);

    	return "{$count} {$plural}";
    }

    public function statusCount(){

    	$count = $this->entity->statuses()->count();
    	$plural = str_plural('Status', $count);

    	return "{$count} {$plural}";
    }

}