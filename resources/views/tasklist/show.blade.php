@extends('master')

@section('content')
    <h1>
        {{$tasklist->name }} [<span id="totalCount">{{$tasklist->completedTasks()}}</span>/{{$tasklist->totalTasks()}}]
    </h1>
    <hr>
    @if($tasklist->categories()->count() > 0)
        @foreach($tasklist->categories as $category)
            @include('category.show', ['category' => $category])
        @endforeach
    @else
        <ul class="list-unstyled">
            <li>
                <span>No categories have been specified yet!</span>
            </li>
        </ul>
    @endif
    <a href="{{action('TaskCategoryController@create', ['listid' => $tasklist->id])}}"><span class="glyphicon glyphicon-plus-sign"></span> Add new category</a>
@endsection