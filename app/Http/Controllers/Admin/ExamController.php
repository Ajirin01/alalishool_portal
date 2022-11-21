<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Exam;
use App\Models\Year;
use App\Models\Term;

class ExamController extends Controller
{
    public function index(Request $request){
        if (empty($request->all())) {
            return redirect(route('manage-exams-options'));
        }
        $exams = Exam::where($request->except('_token'))->get();
        return view('admin.exams.index', ['exams'=> $exams,
                    'options'=> $request->except('_token')]);
    }

    public function selectOptions(){
        $years = Year::all();
        $terms = Term::all();
        return view('admin.exams.options', ['years'=> $years, 'terms'=> $terms]);
    }
}
