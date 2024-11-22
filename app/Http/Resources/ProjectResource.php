<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->{Project::ID},
            'name' => $this->{Project::NAME},
            'tasks' => TaskResource::collection($this->whenLoaded('tasks'))
        ];
    }
}
