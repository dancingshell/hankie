@extends('layouts.master')

<div class="container text-center"><br/>
    <h1>Results</h1><br />
    @foreach($results as $title => $data)
        {{ Form::open(array('action' => 'MovieController@selectMovie')) }}
        {{ Form::hidden('movie', $title) }}
        {{ Form::hidden('fromDB', $data['fromDB']) }}
        {{ Form::submit($title. ' -- ' .$data['year'], array('class' => 'btn btn-default')); }}
        {{ Form::close() }}
    @endforeach
</div>