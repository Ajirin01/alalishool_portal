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


class ResultController extends Controller
{
    public function index(Request $request){
        if (empty($request->all())) {
            return redirect(route('manage-results-options'));
        }
        $results = Result::with('subject', 'exam', 'exam_paper', 'student', 'term')->where($request->except('_token'))->get();
        return view('admin.results.index', ['results'=> $results,
                    'options'=> $request->except('_token')]);
    }

    public function selectOptions(){
        $terms = Term::all();
        $years = Year::all();

        if(Auth::user()->role == "teacher"){
            $teacher = Teacher::with('teacher_classes', 'teacher_subjects')->where('user_id', Auth::user()->id)->first();
            $classes = $teacher->teacher_classes;
            $subjects = $teacher->teacher_subjects;
        }else if(Auth::user()->role == "admin"){
            $classes = Classes::all();
            $subjects = Subject::all();
        }

        return view('admin.results.options', ['terms'=> $terms, 'years'=> $years, 'subjects'=> $subjects, 'classes'=> $classes]);
    }
}
