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
}
