<?php

class Rep extends \Eloquent {
	protected $guarded = ['id'];
	protected $table = 'reps';
	protected $with = ['user'];

	public function user()
	{
		return $this->belongsTo('User', 'user_id', 'id');

	}
}