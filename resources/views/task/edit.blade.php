@extends('master')

@section('content')
    @include('errors.errors')
    <form class="form-horizontal" action="{{action("TaskController@update", ['id' => $task->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT" />
        <fieldset>
            <!-- Form Name -->
            <legend>Edit Task</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="catid">Category</label>
                <div class="col-md-6">
                    <select id="catid" name="catid" class="form-control">
                        @foreach($categories as $category)
                            <option {{ $category->id == old('catid', $task->catid) ? 'selected="selected"': '' }} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="task">Task</label>
                <div class="col-md-6">
                    <input id="task" name="task" type="text" placeholder="Input task..." class="form-control input-md" value="{{ old('task', $task->task) }}">
                    <span class="help-block">The name of the task</span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="meta">Meta</label>
                <div class="col-md-6">
                    <input id="meta" name="meta" type="text" placeholder="Input meta..." class="form-control input-md" value="{{ old('meta', $task->meta) }}">
                    <span class="help-block">Meta of the task (for example, what are the rewards)</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-1 control-label" for="save"></label>
                <div class="col-md-6">
                    <button id="save" name="save" class="btn btn-primary col-md-4">Save</button>
                </div>
            </div>

        </fieldset>
    </form>

@endsection