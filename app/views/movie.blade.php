@extends('layouts.master')
{{HTML::linkAction('MovieController@index', 'Search for movies')}}
<h1>{{{$movie->name}}}</h1>

<h3>How Sad?
    <a href={{URL::action('RatingController@store', array(1, $movie->id))}}><img src="/images/hankie.gif" width="25"></a>
    <a href={{URL::action('RatingController@store', array(2, $movie->id))}}><img src="/images/hankie.gif" width="25"></a>
    <a href={{URL::action('RatingController@store', array(3, $movie->id))}}><img src="/images/hankie.gif" width="25"></a></h3><br />
@if($movie->poster && $movie->poster != 'N/A' )
    <img src={{$movie->poster}}>
@endif
@if($movie->description != 'N/A' )
    <p>{{{$movie->description}}}</p>
@endif
