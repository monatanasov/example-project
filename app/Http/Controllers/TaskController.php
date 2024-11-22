<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request): TaskResource
    {
        $data = $request->validated();
        $task = Task::create($data);

        return new TaskResource($task);
    }

    public function update(TaskUpdateRequest $request, Task $task): TaskResource
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }
}
