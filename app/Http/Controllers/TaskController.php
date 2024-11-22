<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
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
}
