@extends('master')

@section('content')
    @include('errors.errors')
    <form class="form-horizontal" action="{{action("TasklistController@update", ['id' => $tasklist->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT" />
        <fieldset>
            <!-- Form Name -->
            <legend>Edit Tasklist</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="name">Name</label>
                <div class="col-md-6">
                    <input id="name" name="name" type="text" placeholder="Input name..." class="form-control input-md" value="{{ old('name', $tasklist->name) }}">
                    <span class="help-block">The name of the task</span>
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