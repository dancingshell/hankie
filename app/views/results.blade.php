@extends('layouts.master')

<div class="container text-center"><br/>
    <h1>Results</h1><br />
    @foreach($results as $key => $data)
        {{ Form::open(array('action' => 'MovieController@selectMovie')) }}
        {{ Form::hidden('movie', $data['name']) }}
        {{ Form::hidden('fromDB', $data['fromDB']) }}
        {{ Form::submit($data['name']. ' -- ' .$data['year'], array('class' => 'btn btn-default')); }}
        {{ Form::close() }}
    @endforeach
</div>