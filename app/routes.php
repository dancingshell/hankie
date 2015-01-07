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

Route::resource('movie/bookmark', 'BookmarkController');
Route::resource('movie/comment', 'CommentController');
Route::resource('movie/watchlist', 'WatchlistController');
//Route::resource('rating', 'RatingController');
Route::post('movie/{id}', 'RatingController@rate');
Route::get('movies/results', array('as' => 'movies.results', function($results = null) {
	return View::make('results', array('results' => $results));
}));
Route::post('movies/result', 'MovieController@selectMovie');
//Route::post('rating?test', array('as' => 'rating.create'), function($rating, $movie, $user) {
//	var_dump("test");
//});



//Route::post('movies', function() {
//	$keyword = Input::get('keyword');
//
//});

//Route::get('movies', function()
//{
//	return View::make('movies');
//});
