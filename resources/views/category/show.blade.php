<h2>
    <div class="row">
        <div class="col-md-5"><a href="#{{$category->id}}" id="{{$category->id}}">{{ $category->name }}</a> </div>
        <div class="col-md-4">{{ $category->title == null ? '' : '[' . $category->title . ']'}}</div>
        <div class="col-md-1">[<span id="count-{{$category->id}}">{{$category->completedTasks()}}</span>/{{$category->totalTasks() }}]</div>
        <div class="col-md-2">
            <a href="{{ action('TaskCategoryController@edit', ['id' => $category->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="{{ action('TaskCategoryController@destroy', ['id' => $category->id]) }}" data-method="delete" data-confirm="Are you sure?"><span class="glyphicon glyphicon-trash"></span></a>
        </div>

    </div>
</h2>
@if($category->tasks()->whereNull('tasks.parenttask')->count() > 0)
<ul class="list-unstyled">
    <li>
        <div class="row">
            <div class="col-md-6">
                <strong>Task</strong>
            </div>
            <div class="col-md-6">
                <strong>Meta</strong>
            </div>
        </div>
    </li>
    @foreach($category->tasks()->whereNull('tasks.parenttask')->get() as $task)
        @include('task.show', ['task' => $task, 'category' => $category ])
    @endforeach
</ul>
@else
    <ul class="list-unstyled">
        <li>
            <span>No tasks have been specified yet!</span>
        </li>
    </ul>
@endif
<a href="{{action('TaskController@create', ['catid' => $category->id])}}"><span class="glyphicon glyphicon-plus-sign"></span> Add new task</a>
<hr>