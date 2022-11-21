<?php

namespace App\View\Components\name;

use Illuminate\View\Component;

class nounArea extends Component
{
    public $name;
    public $id;
    public $noun;

    public function __construct($id, $name, $noun)
    {
        $this->id = $id;
        $this->name = $name;
        $this->noun = $noun;
    }
    
    public function render()
    {
        return view('components.general.noun-area');
    }
}
