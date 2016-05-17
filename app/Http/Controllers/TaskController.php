<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
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
        $current = $request->input('catid');
        $categories = TaskCategory::all();
        $tasks = is_null($current) ? Task::all()->orderBy('taskorder') : Task::where('catid', $current)->orderBy('taskorder')->get();
        return view('task.create', compact('categories', 'current', 'tasks'));
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
            'task' => 'required',
            'catid' => 'required:exists:task_categories,id',
            'parenttask' => 'exists:tasks,id'
        ]);

        $insertedTask = Task::create([
            'task' => $request->input('task'),
            'meta' => $request->input('meta'),
            'catid' => $request->input('catid'),
            'parenttask' => $request->input('parenttask'),
            'taskorder' => Task::orderBy('taskorder', 'DESC')->first()->taskorder +1
        ]);

        if($request->input('taskorder') && $request->input('taskorder') != -1) {
            Task::where('id', '>', $request->input('taskorder'))->get()->each(function($task){
                $task->taskorder = $task->taskorder +2;
                $task->save();
            });

            $task = Task::findOrFail($request->input('taskorder'));

            $insertedTask->taskorder = $task->taskorder +1;
            $insertedTask->save();
        }

        return redirect(action('TasklistController@show', ['id' => TaskCategory::findOrFail($request->input('catid'))->listid]));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Task $task)
    {
        $categories = TaskCategory::all();
        $tasks = Task::where('catid', $task->catid)->orderBy('taskorder')->get();
        return view('task.edit', compact('categories', 'task', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Task                 $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'task' => 'required',
            'catid' => 'required:exists:task_categories,id',
            'parenttask' => 'exists:tasks,id'
        ]);

        $task->update([
            'task' => $request->input('task'),
            'meta' => $request->input('meta'),
            'catid' => $request->input('catid'),
            'parenttask' => $request->input('parenttask'),
        ]);

        if($request->input('taskorder') && $request->input('taskorder') != -1) {
            Task::where('id', '>', $request->input('taskorder'))->get()->each(function($task){
                $task->taskorder = $task->taskorder +2;
                $task->save();
            });

            $before = Task::findOrFail($request->input('taskorder'));

            $task->taskorder = $before->taskorder +1;
            $task->save();
        }

        return redirect(action('TasklistController@show', ['id' => TaskCategory::findOrFail($task->catid)->listid]));
    }

    public function signoff(Request $request, Task $task) {
        if($request->input('checked') == 'true')
            $task->signOff();
        else
            $task->removeSignOff();

        return $request->input('checked');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect(action('TasklistController@show', ['id' => TaskCategory::findOrFail($task->catid)->listid]));
    }
}
