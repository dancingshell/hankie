@extends('layouts.master')
<div class="text-center">
    <h1>3 Hankie</h1>
    <h3>Movie Mood Ratings</h3>

    <form class="form-inline">
        {{Form::open(array('action' => 'MovieController@store')) }}
        <div class="form-group">
            <div class="sr-only"></div>
            {{Form::text('keyword', null, array('placeholder' => 'search movies', 'class' => 'form-control' ))}}
        </div>
        <div class="form-group">
            <div class="sr-only"></div>
            {{Form::submit('SEARCH', array('class' => 'btn btn-success'))}}
        </div>
        {{Form::close()}}
    </form>

</div>

<ul class="movie-ul">
@foreach($movies as $movie)
    @if($movie->poster && $movie->poster != 'N/A')
        <li class="movie-li">

            <a href={{URL::action('MovieController@show', $movie->id)}}><img src={{asset($movie->poster)}}>
                <div class="movie-info">
                    <p>{{$movie->name}}</p>
                    {{--<div class="movie-score">--}}
                    {{--{{{$movie->hankie}}}--}}
                    {{--</div>--}}
                </div>
            </a>
        </li>
    @endif
@endforeach
</ul>