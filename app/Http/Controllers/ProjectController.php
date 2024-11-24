<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;
use Exception;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $projects = Project::with('tasks')->get();

        return ProjectResource::collection($projects);
    }
    public function store(ProjectStoreRequest $request): ProjectResource
    {
        $data = $request->validated();
        $project = Project::create($data);

        return new ProjectResource($project);
    }

    public function update(ProjectUpdateRequest $request, Project $project): ProjectResource
    {
        $project->update($request->validated());

        return new ProjectResource($project);
    }

    public function destroy(Project $project): JsonResponse
    {
        try {
            $project->delete();

            return response()->json([
                'message' => 'Project deleted successfully.',
                'status' => 'success',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to delete the project.',
                'status' => 'error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
