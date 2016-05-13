<li>
    <div class="row">
        <div class="col-md-6">
            <input type="checkbox" name="{{$category->id . '-' . $task->id}}" {{$task->isComplete() ? 'checked="checked"' : ''}} value="1"/> {{ $task->task }}
        </div>
        <div class="col-md-6">
            <em>{{$task->meta}}</em>
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