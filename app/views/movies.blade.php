@extends('layouts.master')
<div class="text-center">
    <h3>Search for a movie</h3>

    {{Form::open(array('action' => 'MovieController@store')) }}
        {{Form::text('keyword', null, array('placeholder' => 'search movies'))}}
        {{Form::submit('SEARCH', array('class' => 'btn btn-success'))}}
    {{Form::close()}}
</div>

<ul class="movie-ul">
@foreach($movies as $movie)
    @if($movie->poster && $movie->poster != 'N/A')
        <li class="movie-li">
            <a href={{URL::action('MovieController@show', $movie->id)}}><img src={{asset($movie->poster)}}>
            <p>{{$movie->name}}</p></a>
        </li>
    @endif
@endforeach
</ul>