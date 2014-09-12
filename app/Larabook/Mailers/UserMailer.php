<?php namespace Larabook\Mailers;

use Larabook\Users\User;

class UserMailer extends Mailer {

	public function sendWelcomeMessageTo(User $user){

		$subject = 'Kje sii, kje si, kje si ti, kje si bil, kam boš šel, koliko zapravil?';
		$view = 'emails.registration.confirm';

		$data = [];

		return $this->sendTo($user, $subject, $view, $data);
	}

}