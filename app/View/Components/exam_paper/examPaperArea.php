<?php

namespace App\View\Components\name;

use Illuminate\View\Component;

class examPaperArea extends Component
{
    public $name;
    public $id;
    public $duration;
    public $startTime;
    public $status;
    public $instruction;

    public function __construct($id, $name, $duration, $startTime, $status, $instruction)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->startTime = $startTime;
        $this->status = $status;
        $this->instruction = $instruction;
    }
    
    public function render()
    {
        return view('components.exam_paper.exam-paper-area');
    }
}
