<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Result;
use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Exam;
use App\Models\ExamPaper;


class ResultController extends Controller
{
    public function index(Request $request){
        if (empty($request->all())) {
            return redirect(route('manage-results-options'));
        }

        $results = Result::where($request->except('_token'))->get();

        $exam_pape = ExamPaper::find($request->exam_paper_id);
        return view('admin.results.index', ['results'=> $results,
                    'options'=> $request->except('_token'), 'exam_paper'=> $exam_pape]);
    }

    public function selectOptions(){
        $exams = Exam::all();

        return view('admin.results.options', ['exams'=> $exams]);
    }
}
