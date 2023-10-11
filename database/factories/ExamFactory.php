<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->word(2,10),
            'descripton'=> $this->faker->word(5,20),
            'start_date'=> $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'end_date'=> $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'year_id'=> rand(1,10),
            'term_id'=> rand(1,3),
            'status'=> 'active'
        ];
    }
}
