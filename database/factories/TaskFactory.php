<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'title' => $this->faker->text($this->faker->numberBetween(5, 20)),
            'description' => $this->faker->text($this->faker->numberBetween(550, 650)),
            'created_by' =>  User::whereIsAdmin(1)->pluck('id')->random(),
            'assigned_to' =>  $this->faker->numberBetween(1, 10)
        ];
    }
}
