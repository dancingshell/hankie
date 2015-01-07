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
	return View::make('index');
});

Route::get('users', 'UserController@index');

Route::get('user/{id}', 'UserController@showProfile');
Route::get('movies', 'MovieController@index');
Route::get('movie/{id}', 'MovieController@show');
Route::get('movies/create', 'MovieController@create');
Route::post('movies', 'MovieController@store');
Route::get('movie', 'RatingController@store');


Route::resource('bookmark', 'BookmarkController');
Route::resource('comment', 'CommentController');
Route::resource('watchlist', 'WatchlistController');




//Route::post('movies', function() {
//	$keyword = Input::get('keyword');
//
//});

//Route::get('movies', function()
//{
//	return View::make('movies');
//});
