<?php

namespace App\View\Components\teacher;

use Illuminate\View\Component;

class teacherSubjectsAdd extends Component
{
    public $id;
    public $subjects;
    public $teacher;

    public function __construct($id, $subjects, $teacher)
    {
        $this->id = $id;
        $this->subjects  = $subjects;
        $this->teacher = $teacher;
    }
    
    public function render()
    {
        return view('components.teacher.teacher-subjects-add');
    }
}
