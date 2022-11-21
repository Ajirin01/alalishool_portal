<?php

namespace App\View\Components\teacher;

use Illuminate\View\Component;

class teacherSubjectsArea extends Component
{
    public $id;
    public $name;
    
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function render()
    {
        return view('components.teacher.teacher-subjects-area');
    }
}
