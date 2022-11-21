<?php

namespace App\View\Components\question;

use Illuminate\View\Component;

class questionAnswerAdd extends Component
{
    public $questionId;

    public function __construct($questionId)
    {
        $this->questionId = $questionId;
    }
    
    public function render()
    {
        return view('components.question.question-answer-add');
    }
}
