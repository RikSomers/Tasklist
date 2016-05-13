<h2>
    <div class="row">
        <div class="col-md-6"><a href="#{{$category->id}}" id="{{$category->id}}">{{ $category->name }}</a> </div>
        <div class="col-md-4">[{{ $category->title }}]</div>
        <div class="col-md-1">[<span id="count-{{$category->id}}">{{$category->completedTasks()}}</span>/{{$category->totalTasks() }}]</div>
        <div class="col-md-1"><a href="{{ action('TaskCategoryController@edit', ['id' => $category->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a></div>

    </div>
</h2>
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
<hr>