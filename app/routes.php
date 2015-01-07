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

Route::get('users', 'UserController@index');
Route::get('user/{id}', 'UserController@showProfile');
Route::get('/', 'MovieController@index');
Route::get('movies', 'MovieController@index');
Route::get('movie/{id}', 'MovieController@show');
Route::get('movies/create', 'MovieController@create');
Route::post('movies', 'MovieController@store');
Route::resource('movie/bookmark', 'BookmarkController');
Route::resource('movie/comment', 'CommentController');
Route::resource('movie/watchlist', 'WatchlistController');
Route::post('movie/{id}', 'RatingController@rate');
Route::post('movies/result', 'MovieController@selectMovie');