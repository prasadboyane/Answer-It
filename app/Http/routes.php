<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');
Route::post('/done_voting', 'UserController@done_vote');
Route::post('post_question','UserController@post_question');
Route::get('/search_friend', 'UserController@search_friend');
Route::post('visitor/done_voting', 'VisitorController@done_vote');
Route::post('visitor/post_question','VisitorController@post_question');
Route::get('visitor/search_friend', 'UserController@search_friend');
Route::get('/visitor/{username}', 'UserController@visitor');
Route::post('done_reg', 'AuthController@done_reg');
Route::post('approval', 'UserController@approval');
Route::get('/Introduction', 'UserController@intro');
Route::get('/feedback', 'UserController@feedback');
Route::post('done_feedback','UserController@doneFeedback');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
