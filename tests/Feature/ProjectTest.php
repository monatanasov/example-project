<?php

namespace Tests\Feature;

use App\Models\Project;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    private function indexRoute(): string
    {
        return route('project.index');
    }

    private function storeRoute(): string
    {
        return route('project.store');
    }

    private function updateRoute($id): string
    {
        return route('project.update', $id);
    }

    public function testIndexReturnsAllProjects()
    {
        $project = Project::factory()->create();
        $url = $this->indexRoute();

        $this
            ->get($url)
            ->assertSee($project->{Project::NAME});
    }
    public function testStoreProjectNameIsRequired()
    {
        $project = Project::factory()->raw();
        unset($project[Project::NAME]);

        $this
            ->postJson($this->storeRoute(), $project)
            ->assertUnprocessable()
            ->assertInvalid(Project::NAME);
    }

    public function testStoreProjectNameIsString()
    {
        $project = Project::factory()->raw([
            Project::NAME => 0,
        ]);

        $this
            ->postJson($this->storeRoute(), $project)
            ->assertUnprocessable()
            ->assertInvalid(Project::NAME);
    }

    public function testStoreProjectNameHasMin()
    {
        $project = Project::factory()->raw([
            Project::NAME => '',
        ]);

        $this
            ->postJson($this->storeRoute(), $project)
            ->assertUnprocessable()
            ->assertInvalid(Project::NAME);
    }

    public function testStoreProjectNameHasMax()
    {
        $project = Project::factory()->raw([
            Project::NAME => str_repeat('a', 101),
        ]);

        $this
            ->postJson($this->storeRoute(), $project)
            ->assertUnprocessable()
            ->assertInvalid(Project::NAME);
    }

    public function testStoreProjectCanBeStored()
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

    // TODO: add additional tests for ProjectUpdateRequest rules
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
