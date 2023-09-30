<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Question;
use App\Models\Year;
use App\Models\Teacher;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\ExamPaper;


class QuestionController extends Controller
{
    public function index(Request $request){
        $exam_paper =  ExamPaper::find($request->exam_paper_id);

        if (empty($request->all())) {
            return redirect(route('manage-questions-options'));
        }
        $questions = Question::where($request->except('_token', 'year_id'))->get();

        return view('admin.questions.index', ['questions'=> $questions,
                    'options'=> ['exam_id'=> $request->exam_id, 
                    'exam_paper_id'=> $request->exam_paper_id,
                    'classes_id'=> $exam_paper->classes_id,
                    'subject_id'=> $exam_paper->subject_id
                    ]
                ]);
    }

    public function selectOptions(){
        $exams = Exam::all();

        return view('admin.questions.options', ['exams'=> $exams]);
    }
}
