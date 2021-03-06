<fb:login-button scope="public_profile,email" data-auto-logout-link="true" onlogin="checkLoginState();">
</fb:login-button>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<div id="status">
</div>

{{--{{FacebookSession::setDefaultApplication('YOUR_APP_ID', 'YOUR_APP_SECRET');}}--}}

@extends('layouts.master')
<div class="text-center">
    <h1>3 Hankie</h1>
    <h3>Movie Mood Ratings</h3>

    <div class="form-inline">
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
    </div>

</div>

<ul class="movie-ul">
@foreach($movies as $movie)
    @if($movie->poster && $movie->poster != 'N/A')
        <li class="movie-li">
            <a href={{URL::action('MovieController@show', $movie->id)}}><img src={{asset($movie->poster)}}>
                <div class="movie-info row">
                    <div class="col-md-3">
                        {{{$movie->hankie}}}
                    </div>
                    <div class="col-md-8 text-center">
                        {{$movie->name}}
                    </div>
                    <div class="col-md-1">
                        {{{$movie->tomato}}}
                    </div>
                </div>
            </a>
        </li>
    @endif
@endforeach
</ul>