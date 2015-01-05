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

Route::filter('teacher_filter', function () {
    if (Auth::guest()) {
        return Redirect::to('home');
    }
    if (Auth::user()->role != 'teacher' && Auth::user()->is_admin == false) {
        return Redirect::to('home');
    }
});
Route::get('/', ['as' => 'home', function () {
    return View::make('homepage');
}]);
Route::get('login', ['as' => 'login',function(){
    return View::make('user.login');
}]);
Route::post('login', 'UsersController@login');
Route::get('logout', ['as' => 'logout', 'uses' => 'UsersController@logout']);
Route::post('register', 'UsersController@create');

Route::group(array('before' => 'auth'), function () {
    Route::group(array('before' => 'teacher_filter'), function () {
        Route::resource('questions', 'QuestionController');
        Route::resource('testpapers','TestPaperController');
    });
});