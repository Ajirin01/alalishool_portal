<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeacherSubject>
 */
class TeacherSubjectFactory extends Factory
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
            'subject_id'=> rand(1,15),
            'subject_name'=> $this->faker->name(),
            'teacher_name'=> $this->faker->name()
        ];
    }
}
