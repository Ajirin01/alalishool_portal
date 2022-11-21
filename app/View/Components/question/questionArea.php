<?php

namespace App\View\Components\question;

use Illuminate\View\Component;

class questionArea extends Component
{
    public $question;
    public $questionId;

    public function __construct($questionId, $question)
    {
        $this->questionId = $questionId;
        $this->question = $question;
    }
    
    public function render()
    {
        return view('components.question.question-area');
    }
}
