<?php

namespace App\View\Components\name;

use Illuminate\View\Component;

class examArea extends Component
{
    public $name;
    public $id;
    public $phone;
    public $email;

    public function __construct($id, $name, $phone, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }
    
    public function render()
    {
        return view('components.teacher.teacher-area');
    }
}
