@extends('layouts.master')
<h3>Search for a movie</h3>

{{Form::open(array('action' => 'MovieController@store')) }}
    {{Form::text('keyword', null, array('placeholder' => 'search movies'))}}
    {{Form::submit('SEARCH', array('class' => 'btn btn-success'))}}
{{Form::close()}}

<ul class="movie-ul">
@foreach($movies as $movie)
    @if($movie->poster && $movie->poster != 'N/A')
        <li class="movie-li">
            <a href={{URL::action('MovieController@show', $movie->id)}}><img src={{asset($movie->poster)}}></a>
            <p>{{$movie->name}}</p>
        </li>
    @endif
@endforeach
</ul>