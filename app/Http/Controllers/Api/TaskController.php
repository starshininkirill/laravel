<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::all())->sortByDesc('created_at');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {

        Log::info('Создание задачи:', $request->validated());
        $created_task = Task::create($request->validated());

        return new TaskResource($created_task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(null, 204);
    }
}
