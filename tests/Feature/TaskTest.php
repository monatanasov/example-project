<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    private function storeRoute(): string
    {
        return route('task.store');
    }

    private function updateRoute($id): string
    {
        return route('task.update', $id);
    }

    // TODO: add additional tests for taskStoreRequest rules
    public function testStoreTaskCanBeStored()
    {
        $task = Task::factory()->raw();

        $this
            ->postJson($this->storeRoute(), $task)
            ->assertCreated()
            ->assertSee($task[Task::NAME]);

        $this
            ->assertDatabaseHas(Task::TABLE, [
                Task::PROJECT_ID => $task[Task::PROJECT_ID],
                Task::NAME => $task[Task::NAME],
                Task::DUE_DATE => $task[Task::DUE_DATE]
            ]);
    }

    // TODO: add additional tests for taskUpdateRequest rules
    public function testUpdateTaskCanBeUpdated()
    {
        $task = Task::factory()->create();
        $url = $this->updateRoute($task->{Task::ID});

        $data = $task->toArray();
        $data[Task::NAME] = 'Redesign the project form';

        $this
            ->putJson($url, $data)
            ->assertOk()
            ->assertSee($data[Task::NAME]);

        $this
            ->assertDatabaseHas(Task::TABLE, [
                Task::NAME => $data[Task::NAME],
            ]);
    }
}
