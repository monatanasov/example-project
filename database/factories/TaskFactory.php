<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        // TODO: check if this project exists?
        $firstProjectId = Project::first()->{Project::ID};

        return [
            Task::PROJECT_ID => $firstProjectId,
            Task::NAME => fake()->name(),
            Task::DUE_DATE => fake()->dateTime(),
        ];
    }
}
