@extends('master')

@section('content')
    @foreach ($list as $tasklist)
        <h1>
            <div class="row">
                <div class="col-md-7"><a href="{{ route('Tasklist.show', ['id' => $tasklist->id]) }}">{{ $tasklist->name }}</a></div>
                <div class="col-md-3">[{{$tasklist->completedTasks()}}/{{$tasklist->totalTasks()}}]</div>
                <div class="col-md-2">
                    <a href="{{ action('TasklistController@edit', ['id' => $tasklist->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ action('TasklistController@destroy', ['id' => $tasklist->id]) }}" data-method="delete" data-confirm="Are you sure?"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </div>
        </h1>
        <hr>
    @endforeach
@endsection