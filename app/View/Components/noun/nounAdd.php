<?php

namespace App\View\Components\name;

use Illuminate\View\Component;

class nounAdd extends Component
{
    public $noun;
    public $key;

    public function __construct($noun, $key)
    {
        $this->noun = $noun;
        $this->key = $key;
    }
    
    public function render()
    {
        return view('components.general.noun-add');
    }
}
