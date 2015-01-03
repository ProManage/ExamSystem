<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
});
Route::post('login', function(){
	if(Auth::attempt(Input::only('username', 'password'))) {
		return Redirect::intended('/');
	} else {
		return Redirect::back()
			->withInput()
			->with('error', "Invalid credentials");
	}
});
Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/')
		->with('message', 'You are now logged out');
});
Route::post('register','UsersController@create');

Route::group(array('before'=>'auth'), function(){

});