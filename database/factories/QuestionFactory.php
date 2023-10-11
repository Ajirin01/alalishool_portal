<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exam_id'=> rand(1,50),
            'classes_id'=> rand(1,10),
            'subject_id'=> rand(1,15),
            'exam_paper_id'=> rand(1,100),
            'question'=> $this->faker->word(2,30)
        ];
    }
}
