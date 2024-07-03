<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class SimpleTest extends TestCase
{


    public function test_create_task(): void
    {

        $created_by = User::factory()->create([
            'is_admin' => 1,
        ]);
        $assigned_to = User::factory()->create([
            'is_admin' => 0,
        ]);

        Task::create([
            'title' => 'My Task Name',
            'description' => 'Task Description',
            'created_by' => $created_by->id,
            'assigned_to' => $assigned_to->id,
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'My Task Name',
            'description' => 'Task Description',
            'created_by' => $created_by->id,
            'assigned_to' => $assigned_to->id,
        ]);
    }


    public function test_list_task(): void
    {
        $tasks = Task::limit(3)->get();

        $response = $this->get('tasks');

        $response->assertStatus(200);

        $this->assertCount($tasks->count(), $tasks);

    }

    public function test_show_task(): void
    {
        $task = Task::factory()->create();
        $response = $this->get("/tasks/{$task->id}");
        $response->assertStatus(200);
    }
}
