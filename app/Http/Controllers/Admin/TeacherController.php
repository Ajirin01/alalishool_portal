<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Teacher;
use App\Models\Classes;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index(Request $request){
        $teachers = Teacher::with('user')->get();
        $classes= Classes::all();
        $subjects = Subject::all();
        return view('admin.teacher.index', ['teachers'=> $teachers, 'classes'=> $classes, 'subjects'=> $subjects]);
    }
}
