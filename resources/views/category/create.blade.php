@extends('master')

@section('content')
    <h1>
        <div class="row">
            <div class="col-md-11">Create Category</div>
            <div class="col-md-1 text-right"><a href="{{ URL::previous() }}">Back</a></div>
        </div>
    </h1><br />
    @include('errors.errors')
    <form class="form-horizontal" action="{{action("TaskCategoryController@store")}}" method="POST">
        <fieldset>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="tasklist">Tasklist</label>
                <div class="col-md-6">
                    <select id="tasklist" name="tasklist" class="form-control">
                        @foreach($tasklists as $tasklist)
                            <option {{ $current == $tasklist->id ? 'selected="selected"' : '' }} value="{{$tasklist->id}}">{{$tasklist->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="name">Name</label>
                <div class="col-md-6">
                    <input id="name" name="name" type="text" placeholder="Input name..." class="form-control input-md">
                    <span class="help-block">The name of the category</span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-1 control-label" for="meta">Meta</label>
                <div class="col-md-6">
                    <input id="meta" name="meta" type="text" placeholder="Input name..." class="form-control input-md">
                    <span class="help-block">Meta of the category (for example, which level range is this category for)</span>
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