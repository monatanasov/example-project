<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();
        $project = Project::create($data);

        return new ProjectResource($project);
    }
}
