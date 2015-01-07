<div class="text-center container">
    @extends('layouts.master')
    <br>
    {{HTML::linkAction('MovieController@index', '<- Search for movies', null, array('class' => 'btn btn-warning pull-left'))}}<br />
    <h1>{{{$movie->name}}}</h1>
    @if($movie->description != 'N/A' )
        <p>{{{$movie->description}}}</p>
    @endif
    <div class="row">
        <div class="col-md-11">
            <div class="col-md-1 col-md-offset-3">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', 3) }}
                {{ Form::submit('3', array('class' => 'btn btn-danger btn-rate')); }}
                {{ Form::close() }}
            </div>

            <div class="col-md-1">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', 2) }}
                {{ Form::submit('2', array('class' => 'btn btn-warning btn-rate')); }}
                {{ Form::close() }}
            </div>
            <div class="col-md-1">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', 1) }}
                {{ Form::submit('1', array('class' => 'btn btn-yellow btn-rate')); }}
                {{ Form::close() }}
            </div>
            <div class="col-md-1">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', 0) }}
                {{ Form::submit('0', array('class' => 'btn btn-default btn-rate')); }}
                {{ Form::close() }}
            </div>
            <div class="col-md-1">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', -1) }}
                {{ Form::submit('-1', array('class' => 'btn btn-success btn-rate')); }}
                {{ Form::close() }}
            </div>

            <div class="col-md-1">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', -2) }}
                {{ Form::submit('-2', array('class' => 'btn btn-info btn-rate')); }}
                {{ Form::close() }}
            </div>

            <div class="col-md-1">
                {{ Form::open(array('action' => 'RatingController@rate')) }}
                {{ Form::hidden('movie', $movie) }}
                {{ Form::hidden('movie_id', $movie->id) }}
                {{ Form::hidden('user_id', 15) }}
                {{ Form::hidden('score', -3) }}
                {{ Form::submit('-3', array('class' => 'btn btn-primary btn-rate')); }}
                {{ Form::close() }}
            </div>
        </div>

    </div>
    @if($movie->hankie)
        <h4>Score: {{{$movie->hankie}}}</h4>
    @endif
    @if($movie->poster && $movie->poster != 'N/A' )
        <img src={{$movie->poster}}>
    @endif
</div>

