@extends('layouts.master')
hello! I am {{{ $user->name }}}!!!

<h2>Movies I like:</h2>
<ul>
    @foreach($movies as $movie)
        <li>{{link_to_action('MovieController@show', $movie->name, $parameters = array($movie->id))}}
        @foreach($userRatings as $rating)
            @if($rating->movie_id == $movie->id)
                -- {{{$rating->score}}}</li>
            @endif
        @endforeach
    @endforeach
</ul>
