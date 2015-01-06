<?php

class UserController extends BaseController {

    public function index()
    {
        $users = User::all();

        return View::make('users', array('users' => $users));
    }

    public function showProfile($id)
    {
        $user = User::find($id);

        $userRatings = Rating::where('user_id', $user->id)->get();
        $movies = array();
        foreach ($userRatings as $rating) {
            $movies = array_merge($movies, DB::table('movies')->where('id', $rating->movie_id)->get());
        }

        return View::make('user', array('user' => $user, 'userRatings' => $userRatings, 'movies' => $movies));
    }
}