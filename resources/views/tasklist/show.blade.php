@extends('master')

@section('content')
    <h1>
        <div class="row">
            <div class="col-md-11">{{$tasklist->name }} [<span id="totalCount">{{$tasklist->completedTasks()}}</span>/{{$tasklist->totalTasks()}}]</div>
            <div class="col-md-1 text-right"><a href="{{ action('TasklistController@index') }}">Back</a></div>
        </div>
    </h1><br />
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