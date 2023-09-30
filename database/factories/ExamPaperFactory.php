<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamPaper>
 */
class ExamPaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word(2, 10),
            'classes_id'=> rand(1,10),
            'subject_id'=> rand(1, 15),
            'exam_id'=> rand(1, 50),
            'instruction'=> $this->faker->word(5, 50),
            'duration'=> rand(2, 60),
            'start_time'=> $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'status'=> 'active'
        ];
    }
}
