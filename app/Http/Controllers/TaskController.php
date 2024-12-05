<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response([
            'tasks' => Task::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): Response
    {
        $task = Task::create($request->all());
        return response([
            'task' => $task
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): Response
    {
        return response([
            'task' => $task
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): Response
    {
        $task->title = $request->title;
        $task->body = $request->body;
        $task->update();

        return response([
            'task' => $task,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): Response
    {
        $task->delete();

        return response([
            'msg' => 'Task removed',
        ], 200);
    }
}
