<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // TODO: check if this project exists?
        $secondProjectId = Project::skip(1)->first()->{Project::ID};

        Task::factory()->create([
            Task::NAME => 'Define Project Requirements and Scope',
        ]);

        Task::factory()->create([
            Task::NAME => 'Design the System Architecture',
        ]);

        Task::factory()->create([
            Task::PROJECT_ID => $secondProjectId,
            Task::NAME => 'Develop User Authentication',
        ]);
    }
}
