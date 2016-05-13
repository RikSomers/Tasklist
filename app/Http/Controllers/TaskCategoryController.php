<?php

namespace App\Http\Controllers;

use App\TaskCategory;
use App\TaskList;
use Illuminate\Http\Request;

use App\Http\Requests;

class TaskCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklists = TaskList::all();
        return view('category.create', compact('tasklists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'tasklist' => 'required:exists:task_lists,id'
        ]);

        TaskCategory::create([
            'name' => $request->input('name'),
            'title' => $request->input('meta'),
            'listid' => $request->input('tasklist')
        ]);

        return redirect(action('TasklistController@show', ['id' => $request->input('tasklist')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TaskCategory $category
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(TaskCategory $category)
    {
        $tasklists = TaskList::all();
        return view('category.edit', compact('tasklists', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\TaskCategory         $category
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, TaskCategory $category)
    {
        $this->validate($request, [
            'name' => 'required',
            'tasklist' => 'required:exists:task_lists,id'
        ]);

        $category->update([
            'name' => $request->input('name'),
            'title' => $request->input('meta'),
            'listid' => $request->input('tasklist')
        ]);

        return redirect(action('TasklistController@show', ['id' => $request->input('tasklist')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
