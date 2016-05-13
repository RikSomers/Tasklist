<?php

namespace App\Http\Controllers;

use App\TaskCategory;
use App\TaskList;
use Illuminate\Http\Request;

use App\Http\Requests;

class TasklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = TaskList::all();

        return view('tasklist.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasklist.create');
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
            'name' => 'required'
        ]);

        TaskList::create([
            'name' => $request->input('name')
        ]);

        return redirect(action('TasklistController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\TaskList $tasklist
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(TaskList $tasklist)
    {
        return view('tasklist.show', compact('tasklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TaskList $tasklist
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(TaskList $tasklist)
    {
        return view('tasklist.edit', compact('tasklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\TaskList             $tasklist
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, TaskList $tasklist)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tasklist->update([
            'name' => $request->input('name')
        ]);

        return redirect(action('TasklistController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TaskList $tasklist
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(TaskList $tasklist)
    {
        $tasklist->delete();
        return redirect(action('TasklistController@index'));
    }
}
