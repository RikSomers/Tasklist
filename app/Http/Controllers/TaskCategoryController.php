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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $current = $request->input('listid');
        $tasklists = TaskList::all();
        return view('category.create', compact('tasklists', 'current'));
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
     * @param \App\TaskCategory $category
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(TaskCategory $category)
    {
        return view('category.show', compact('category'));
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
     * @param \App\TaskCategory $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(TaskCategory $category)
    {
        $category->delete();
        return redirect(action('TasklistController@show', ['id' => $category->listid]));
    }
}
