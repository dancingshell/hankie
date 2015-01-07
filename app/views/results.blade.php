
@foreach($results as $title => $data)
    {{ Form::open(array('action' => 'MovieController@selectMovie')) }}
    {{ Form::hidden('movie', $title) }}
    {{ Form::hidden('inDB', $data['fromDB']) }}
    {{ Form::submit($title. '--' .$data['year'], array('class' => 'btn btn-success btn-result')); }}
    {{ Form::close() }}
@endforeach