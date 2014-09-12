<?php namespace Larabook\Providers;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	public function register(){

		$this->app['events']->listen('Larabook.*', 'Larabook\Handlers\EmailNotifier');
	}
}