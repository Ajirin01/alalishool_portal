<?php

namespace App\View\Components\question;

use Illuminate\View\Component;

class questionAnswerArea extends Component
{
    public $answerId;
    public $answer;
    public $correct;

    public function __construct($answerId ,$answer, $correct)
    {
        $this->answerId =  $answerId;
        $this->answer =  $answer;
        $this->correct =  $correct;
    }
    
    public function render()
    {
        return view('components.question.question-answer-area');
    }
}
