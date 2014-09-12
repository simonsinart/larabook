<?php

Route::get('/', [
	'as'   => 'home',
	'uses' => 'PagesController@home'	
]);

/*
 * Registration	
 */

Route::get('register', [
	'as'   => 'register_path',
	'uses' => 'RegistrationController@create'
]);

Route::post('register', [
	'as'   => 'register_path',
	'uses' => 'RegistrationController@store'
]);

/**
 * Login and logout routes
 */

Route::get('login', [
	'as' => 'login_path',
	'uses' => 'SessionController@create' 
]);

Route::post('login', [
	'as' => 'login_path',
	'uses' => 'SessionController@store' 
]);

Route::get('logout', [
	'as' => 'logout_path',
	'uses' => 'SessionController@destroy'
]);

/**
 * Statuses
 */

Route::get('statuses', [
	'before' => 'auth',
	'as' => 'statuses_path',
	'uses' => 'StatusesController@index'
]);

Route::post('statuses', [
	'as' => 'statutes_path',
	'uses' => 'StatusesController@store'
]);

/**
 * Comments for statuses
 */

Route::post('statuses/{id}/comments', [
	'as' => 'comment_path',
	'uses' => 'CommentsController@store'
]);

/**
 * Likes for statuses
 */

Route::post('statuses/{id}/likes', [
	'as' => 'like_path',
	'uses' => 'LikesController@store'
]);

Route::delete('statuses/{id}/likes', [
	'as' => 'dislike_path',
	'uses' => 'LikesController@destroy'
]);

/**
 * Users
 */

Route::get('users', [
 	'as' => 'users_path',
	'uses' => 'UsersController@index']);

Route::get('@{username}', [
	'as' => 'profile_path',
	'uses' => 'UsersController@show'
]);

/**
 * FollowsController
 */

Route::post('follows', [
	'as' => 'follows_path',
	'uses' => 'FollowsController@store'
]);

Route::delete('follows/{id}', [
	'as' => 'follow_path',
	'uses' => 'FollowsController@destroy'
]);

/**
 * Password Resets
 */

Route::controller('password', 'RemindersController');

