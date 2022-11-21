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


class QuestionController extends Controller
{
    public function index(Request $request){
        if (empty($request->all())) {
            return redirect(route('manage-questions-options'));
        }
        $questions = Question::where($request->except('_token', 'year_id'))->get();
        return view('admin.questions.index', ['questions'=> $questions,
                    'options'=> $request->except('_token', 'year_id')]);
    }

    public function selectOptions(){
        if(Auth::user()->role == "teacher"){
            $teacher = Teacher::with('teacher_classes', 'teacher_subjects')->where('id', Auth::user()->teacher->id)->first();
            $classes = $teacher->teacher_classes;
            $subjects = $teacher->teacher_subjects;
        }else{
            $classes = Classes::all();
            $subjects = Subject::all();
        }
        
        $years = Year::all();

        return view('admin.questions.options', ['classes'=> $classes, 'subjects'=> $subjects, 'years'=> $years]);
    }
}
