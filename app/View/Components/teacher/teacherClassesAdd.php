<?php

namespace App\View\Components\teacher;

use Illuminate\View\Component;

class teacherClassesAdd extends Component
{
    public $id;
    public $classes;
    public $teacher;

    public function __construct($id, $classes, $teacher)
    {
        $this->id = $id;
        $this->classes  = $classes;
        $this->teacher = $teacher;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.teacher.teacher-classes-add');
    }
}
