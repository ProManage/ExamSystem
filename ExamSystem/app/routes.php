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
Route::post('login', 'UserController@login');
Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
Route::post('register', 'UserController@store');

Route::group(array('before' => 'auth'), function () {
    Route::group(array('before' => 'teacher_filter'), function () {
        Route::resource('questions', 'QuestionController');
        Route::resource('testpapers','TestPaperController');
        Route::get('/testpapers/{testpapers}/grading/','TestGradingController@index');
        Route::get('/testpapers/{testpapers}/grading/{username}','TestGradingController@show');
        Route::put('/testpapers/{testpapers}/grading/{username}','TestGradingController@update');
        Route::post('/testdata/{question_id}','TestDataController@store');
    });
    Route::resource('tests','TestController');
    Route::resource("users",'UserController');
    Route::put('/tests/{tests}/answers',"TestController@answer");
});
Route::get('/testdata/{question_id}/{io}','TestDataController@get');
Route::get('/result/{runid}/{result}','TestDataController@update');
