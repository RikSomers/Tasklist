@extends('master')

@section('content')
    @include('errors.errors')
    <form class="form-horizontal" action="{{action("TaskController@store")}}" method="POST">
        <fieldset>
            <!-- Form Name -->
            <legend>Create Task</legend>

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
                    <span class="help-block">The name of the category</span>
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

            <div class="form-group">
                <label class="col-md-1 control-label" for="save"></label>
                <div class="col-md-6">
                    <button id="save" name="save" class="btn btn-primary col-md-4">Save</button>
                </div>
            </div>

        </fieldset>
    </form>

@endsection