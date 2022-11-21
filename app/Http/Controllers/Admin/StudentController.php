<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\Classes;
use App\Models\Term;
use App\Models\User;


class StudentController extends Controller
{
    public function index(Request $request){
        if (empty($request->all())) {
            return redirect(route('manage-students-options'));
        }
        $students = Student::where($request->except('_token'))->get();
        $classes= Classes::all();
        return view('admin.student.index', ['students'=> $students,
                    'classes'=> $classes, 'class'=> Classes::find($request->classes_id),
                    'options'=> $request->except('_token')]);
    }

    public function selectOptions(){
        if(Auth::user()->role == "teacher"){
            $classes = Auth::user()->teacher->teacher_classes;
        }else if(Auth::user()->role == "admin"){
            $classes = Classes::all();
        }
        return view('admin.student.options', ['classes'=> $classes]);
    }
}
