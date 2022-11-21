<?php

namespace App\View\Components\question;

use Illuminate\View\Component;

class tableBodyRow extends Component
{
    // public $question;
    // public $questionId;

    // public $answerId;
    // public $answer;
    // public $correct;

    public function __construct()
    {
        // $this->question = $question;
        // $this->questionId = $questionId;
        // $this->answerId = $answerId;
        // $this->answer = $answer;
        // $this->correct = $correct;
    }
    
    public function render()
    {
        return view('components.question.table-body-row');
    }
}
