<?php namespace Larabook\Statuses;

use Eloquent;

class Like extends Eloquent {

	protected $table = "likes";

	protected $fillable = ['user_id', 'status_id', 'value'];


	public function owner(){

		return $this->belongsTo('Larabook\Users\User', 'user_id');
	}

	public static function leaveLike($value, $statusId){

		return new static([
			'status_id' => $statusId,
			'value' => $value
		]);	
	}

	public function getValue(){
		return $this->attributes['value'];
	}

}