<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherClasses>
 */
class TeacherClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'teacher_id'=> rand(1,20),
            'classes_id'=> rand(1,10),
            'classes_name'=> $this->faker->name(),
            'teacher_name'=> $this->faker->name()
        ];
    }
}
