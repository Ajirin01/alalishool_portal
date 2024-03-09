<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ExamPaper;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Exam;

class ExamPaperController extends Controller
{
    public function index(Request $request){
        if (empty($request->all())) {
            return redirect(route('manage-exam-papers-options'));
        }
        $exam_papers = ExamPaper::where($request->except('_token'))->get();
        return view('portal.exam_papers.index', ['exam_papers'=> $exam_papers,
                    'options'=> $request->except('_token')]);
    }

    public function selectOptions(){
        $classes = Classes::all();
        $subjects = Subject::all();
        $exams = Exam::all();
        return view('portal.exam_papers.options', ['classes'=> $classes, 'subjects'=> $subjects, 'exams'=> $exams]);
    }
}
