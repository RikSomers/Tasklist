@extends('master')

@section('content')
    <h1>
        {{$tasklist->name }} [<span id="totalCount">{{$tasklist->completedTasks()}}</span>/{{$tasklist->totalTasks()}}]
    </h1>
    <hr>
    @foreach($tasklist->categories as $category)
        @include('category.show', ['category' => $category])
    @endforeach
@endsection