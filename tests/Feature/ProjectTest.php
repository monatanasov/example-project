<?php

namespace Tests\Feature;

use App\Models\Project;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    private function storeRoute(): string
    {
        return route('project.store');
    }

    private function updateRoute($id): string
    {
        return route('project.update', $id);
    }

    public function testStoreProjectCanBeStored(): void
    {
        $project = Project::factory()->raw();

        $this
            ->postJson($this->storeRoute(), $project)
            ->assertCreated()
            ->assertSee($project[Project::NAME]);

        $this
            ->assertDatabaseHas(Project::TABLE, [
                Project::NAME => $project[Project::NAME],
            ]);
    }

    public function testUpdateProjectCanBeUpdated()
    {
        $project = Project::factory()->create();
        $url = $this->updateRoute($project->{Project::ID});

        $data = $project->toArray();
        $data[Project::NAME] = 'New Web Project';

        $this
            ->putJson($url, $data)
            ->assertOk()
            ->assertSee($data[Project::NAME]);

        $this
            ->assertDatabaseHas(Project::TABLE, [
                Project::NAME => $data[Project::NAME],
            ]);
    }
}
