@extends('master')

@section('content')
    <h1>
        <div class="row">
            <div class="col-md-11">Create Task</div>
            <div class="col-md-1 text-right"><a href="{{ URL::previous() }}">Back</a></div>
        </div>
    </h1><br />
    @include('errors.errors')
    <form class="form-horizontal" action="{{action("TaskController@store")}}" method="POST">
        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="catid">Category</label>
                <div class="col-md-6">
                    <select id="catid" name="catid" class="form-control">
                        @foreach($categories as $category)
                            <option {{ $current == $category->id ? 'selected="selected"' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="task">Task</label>
                <div class="col-md-6">
                    <input id="task" name="task" type="text" placeholder="Input task..." class="form-control input-md">
                    <span class="help-block">The name of the task</span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="meta">Meta</label>
                <div class="col-md-6">
                    <input id="meta" name="meta" type="text" placeholder="Input meta..." class="form-control input-md">
                    <span class="help-block">Meta of the task (for example, what are the rewards)</span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="taskorder">Insert task after:</label>
                <div class="col-md-6">
                    <select id="taskorder" name="taskorder" class="form-control">
                        <option value="-1" selected="selected"> </option>
                        @foreach($tasks as $task)
                            <option value="{{$task->id}}">{{$task->task}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">Leave empty if the task should be inserted at the end of the list.</span>
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