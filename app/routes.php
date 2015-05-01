<?php

Route::get('/',function(){
	return Redirect::route('dashboard');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));


});

Route::group(array('before' => 'auth|Admin'), function()
{

	Route::get('reps',['as' => 'rep.index', 'uses' => 'RepController@index']);
	Route::get('rep/create',['as' => 'rep.create', 'uses' => 'RepController@create']);
	Route::post('rep/create',['as' => 'rep.store', 'uses' => 'RepController@store']);
	Route::get('rep/{id}/edit',['as' => 'rep.edit', 'uses' => 'RepController@edit']);
	Route::put('rep/{id}',['as' => 'rep.update', 'uses' => 'RepController@update']);
	Route::delete('reps/{id}',['as' => 'rep.delete', 'uses' => 'RepController@destroy']);
});