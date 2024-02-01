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

<<<<<<< HEAD
        if(Auth::user()->role == "teacher"){
            $classes_ids = [];
            $subjects_ids = [];

            $teacher_classes = Auth::user()->teacher->teacher_classes;
            $teacher_subjects = Auth::user()->teacher->teacher_subjects;
            // return response()->json($teacher_classes);

            foreach ($teacher_classes as $key => $teacher_class) {
                array_push($classes_ids, $teacher_class->classes_id);
            }

            foreach ($teacher_subjects as $key => $teacher_subject) {
                array_push($subjects_ids, $teacher_subject->subject_id);
            }
            
            $classes = Classes::whereIn('id', $classes_ids)->get();
            $subjects = Subject::whereIn('id', $subjects_ids)->get();

            // return response()->json($classes);

            return view('admin.questions.options', ['exams'=> $exams, 'classes'=> $classes, 'subjects'=> $subjects]);
        }else{
            $classes = Classes::All();
            $subjects = Subject::All();
            return view('admin.questions.options', ['exams'=> $exams, 'classes'=> $classes, 'subjects'=> $subjects]);

        }

        
=======
        return view('admin.questions.options', ['exams'=> $exams]);
>>>>>>> a37d840ba0eb30773ff0e8b9711a87e94cb762fd
    }
}
