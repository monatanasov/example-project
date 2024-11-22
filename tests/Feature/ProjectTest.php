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
}
