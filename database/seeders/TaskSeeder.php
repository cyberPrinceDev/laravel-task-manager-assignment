<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Complete project documentation',
            'description' => 'Write comprehensive documentation for the task manager application including API endpoints and usage guides.',
            'is_completed' => true,
        ]);

        Task::create([
            'title' => 'Fix login bug',
            'description' => 'Users are experiencing issues logging in with special characters in their password.',
            'is_completed' => false,
        ]);

        Task::create([
            'title' => 'Implement dark mode',
            'description' => 'Add a dark mode toggle to the user interface with proper theme persistence.',
            'is_completed' => false,
        ]);

        Task::create([
            'title' => 'Update dependencies',
            'description' => 'Update all composer and npm packages to their latest stable versions.',
            'is_completed' => true,
        ]);

        Task::create([
            'title' => 'Add email notifications',
            'description' => 'Send email notifications when a task is assigned to a user.',
            'is_completed' => false,
        ]);
    }
}
