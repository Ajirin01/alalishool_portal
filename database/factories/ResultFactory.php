<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id'=> rand(1,1000),
            'exam_id'=> rand(1,50),
            'subject_id'=> rand(1,15),
            'classes_id'=> rand(1,10),
            'exam_paper_id'=> rand(1,100),
            'year_id'=> rand(1,10),
            'term_id'=> rand(1,3),
            'score'=> rand(1,10),
            'over'=> rand(1,10)
        ];
    }
}
