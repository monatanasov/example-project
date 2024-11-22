<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::factory()->create([
            Project::NAME => 'Health Monitoring Assistant',
        ]);

        Project::factory()->create([
            Project::NAME => 'Employee Performance Tracker',
        ]);
        Project::factory()->create([
            Project::NAME => 'Network Vulnerability Scanner',
        ]);
    }
}
