@extends('master')

@section('content')
    <h1>
        <div class="row">
            <div class="col-md-11">Export Category</div>
            <div class="col-md-1 text-right"><a href="{{ URL::previous() }}">Back</a></div>
        </div>
    </h1><br />

    <textarea class="form-control" rows="{{$category->tasks()->count()}}">
@foreach($category->tasks()->get() as $task)
{{ $task->task . "\t\t\t\t[" . $task->meta . ']'}}
@endforeach
    </textarea>

@endsection