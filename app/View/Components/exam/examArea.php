<?php

namespace App\View\Components\title;

use Illuminate\View\Component;

class examArea extends Component
{
    public $title;
    public $id;
    public $descripton;
    public $startDate;
    public $endDate;
    public $status;

    public function __construct($id, $title, $descripton, $startDate, $endDate, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->descripton = $descripton;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }
    
    public function render()
    {
        return view('components.exam.exam-area');
    }
}
