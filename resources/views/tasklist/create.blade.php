@extends('master')

@section('content')
    <h1>
        <div class="row">
            <div class="col-md-11">Create Task</div>
            <div class="col-md-1 text-right"><a href="{{ URL::previous() }}">Back</a></div>
        </div>
    </h1><br />
    @include('errors.errors')
    <form class="form-horizontal" action="{{action("TasklistController@store")}}" method="POST">
        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="name">Name</label>
                <div class="col-md-6">
                    <input id="name" name="name" type="text" placeholder="Input name..." class="form-control input-md">
                    <span class="help-block">The name of the tasklist</span>
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