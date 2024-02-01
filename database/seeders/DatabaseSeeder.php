<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(['name'=> 'Olagoke Mubarak',
        'email'=> 'mubarakolagoke@gmail.com',
        'password'=> Hash::make('Ajirin01'),
        'phone'=> '07036998003',
        'role'=> 'admin'
        ]);

        \App\Models\User::factory(300)->create();
        \App\Models\Classes::factory(10)->create();
        \App\Models\Exam::factory(50)->create();
        \App\Models\ExamPaper::factory(100)->create();
        \App\Models\QuestionAnswer::factory(5000)->create();
        \App\Models\Question::factory(1000)->create();
        \App\Models\Result::factory(1000)->create();
        \App\Models\Student::factory(1000)->create();
        \App\Models\Subject::factory(15)->create();
        \App\Models\Teacher::factory(50)->create();
        \App\Models\TeacherClasses::factory(20)->create();
        \App\Models\TeacherSubject::factory(30)->create();
        \App\Models\Term::factory(3)->create();
        \App\Models\Year::factory(20)->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
