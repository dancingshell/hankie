<?php

class MovieController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$movies = Movie::all();
		return View::make('movies', array('movies' => $movies));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$search = Input::get('keyword');

		// find all similar results in DB
		$moviesDB = Movie::where('name', 'LIKE', '%'. $search.'%')->get();
		$imdbSearch = new \imdbsearch();
		$search = urlencode($search);

		$results = $imdbSearch->search($search, [imdbsearch::MOVIE]);
		$searchResults = array();
		foreach ($results as $result) {
			/* @var $result \imdb */
			$searchResults[$result->title()] = ['year' => $result->year(), 'fromDB' => false];
		}
		// if it does not exist, query the IMDB database
		if (count($moviesDB)) {
			if (count($moviesDB) > 1) {
				foreach ($moviesDB as $movie) {
					/* @var $result \imdb */
					$searchResults[$movie->name] = ['year' => $movie->year, 'fromDB' => true];
				}
			} else {
				$first = $moviesDB->first();
				$searchResults[$first->name] = ['year' => $first->year, 'fromDB' => true];
			}
		}

		return View::make('results', array('results' => $searchResults));
	}

	public function selectMovie()
	{
		$movieSelection = Input::get('movie');
		$inDB = Input::get('inDB');
		// check if movie is already in DB before creating
		$movie = Movie::where('name', $movieSelection)->get()->first();
		if ($inDB || !count($movie)) {
			$search = urlencode($movieSelection);
			$url = 'http://www.omdbapi.com/?t=' . $search . '&y=&plot=short&r=json';
			$response = \Httpful\Request::get($url)->send();
			$response = json_decode($response->body);
			if (count($response) != 1) {
				//TODO handle exception
			} else {
				$title = $response->Title;
				$year = $response->Year;
				$plot = $response->Plot;
				$poster = $response->Poster;
				DB::table('movies')->insert(array('name' => $title, 'year' => $year, 'description' => $plot, 'poster' => $poster));
				$movie = Movie::where('name', $title)->get()->first();
			}
		}

		return Redirect::action('MovieController@show', array('id' => $movie->id));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$movie = Movie::where('id', $id)->get()->first();
		return View::make('movie', array('movie' => $movie));
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
