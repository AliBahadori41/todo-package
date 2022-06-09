<?php

namespace Alibahadori\Todo\Http\Controllers;

use Alibahadori\Todo\Http\Requests\AddLabelsRequest;
use Alibahadori\Todo\Http\Requests\CreateTaskRequest;
use Alibahadori\Todo\Http\Requests\UpdateTaskStatusRequest;
use Alibahadori\Todo\Http\Requests\UpdateTaskRequest;
use Alibahadori\Todo\Http\Resources\TaskResource;
use Alibahadori\Todo\Models\Task;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Alibahadori\Todo\Http\Requests\CreateTaskRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTaskRequest $request)
    {
        $task = auth()->user()->tasks()->create($request->except('labels'));

        $task->labels()->attach($request->get('labels'));

        return response()->json([
            'message' => 'Task created successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Alibahadori\Todo\Models\Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Alibahadori\Todo\Models\Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return response()->json([
            'message' => 'Task update successfully.'
        ]);
    }

    /**
     * Update status of a task.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(UpdateTaskStatusRequest $request, Task $task)
    {
        $task->update($request->all());

        return response()->json([
            'message' => 'Task status update successfully.'
        ]);
    }

    /**
     * Add label for task.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLabels(AddLabelsRequest $request, Task $task)
    {
        $task->labels()->attach($request->get('labels'));

        return response()->json([
            'message' => 'Labels added successfully.'
        ]);
    }
}
