<?php

namespace App\Http\Resources;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->{Task::ID},
            'projectId' => $this->{Task::PROJECT_ID},
            'name' => $this->{Task::NAME},
            'dueDate' => $this->{Task::DUE_DATE},
        ];
    }
}
