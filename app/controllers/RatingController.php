<?php

class RatingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function rate()
	{
		$movie_id = Input::get('movie_id');
		$movie = Input::get('movie');
		$user = Input::get('user_id');
		$score = Input::get('score');

		// check if that user has already rated the movie
		$oldRating = Rating::where(array('movie_id'=> $movie_id, 'user_id' => $user))->get()->first();

		// if rating exists, update rating
		if ($oldRating) {
			$oldRating->score = $score;
			$oldRating->save();
		// if no rating exists, create one
		} else {
			$newRating = new Rating(array('movie_id'=> $movie_id, 'user_id' => $user, 'score' => $score));
			$newRating->save();
		}


		return Redirect::action('MovieController@show', array('id' => $movie_id))->with('message', "You gave $movie a rating of $score");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($rating, $movie, $user = null)
	{
		DB::table('ratings')->insert(array('score' => $rating, 'movie_id' => $movie, 'user_id' => $user ));
		var_dump("cheese");
		return Redirect::action('MovieController@show', array('id' => $movie));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($rating, $movie, $user = null)
	{
		DB::table('ratings')->insert(array('score' => $rating, 'movie_id' => $movie, 'user_id' => $user ));
		var_dump("cheese");
		return Redirect::action('MovieController@show', array('id' => $movie));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
