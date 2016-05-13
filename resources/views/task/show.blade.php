<li>
    <div class="row">
        <div class="col-md-6">
            <input type="checkbox" name="{{$category->id . '-' . $task->id}}" {{$task->isComplete() ? 'checked="checked"' : ''}} value="1"/> {{ $task->task }}
        </div>
        <div class="col-md-5">
            <em>{{$task->meta == null ? 'none' : $task->meta}}</em>
        </div>
        <div class="col-md-1">
            <a href="{{ action('TaskController@edit', ['id' => $task->id]) }}"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="{{ action('TaskController@destroy', ['id' => $task->id]) }}" data-method="delete" data-confirm="Are you sure?"><span class="glyphicon glyphicon-trash"></span></a>
        </div>
    </div>
    @if($task->children()->count() > 0)
        <ul class="list-unstyled" style="padding-left: 20px;">
            @foreach($task->children as $child)
                @include('task.show', ['task' => $child])
            @endforeach
        </ul>
    @endif
</li>