<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\ExamPaper;
use App\Models\Result;

class AuthController extends Controller
{
    public function welcome(){
        $user = Auth::user();
        // return $user->student;

        $classes_id = $user->student->classes_id;
        $student_id = $user->student->id;

        $exam_paper = ExamPaper::where(['classes_id'=> $classes_id])->whereRaw("(SUBTIME(start_time, '00:30:00') <= NOW()) and (ADDTIME(start_time, '00:30:00') >= NOW())")->first();
        // return $exam_paper;
        if($exam_paper === null){
            // $result = null;
            // $questions = [];
            
            return view('student.welcome', ['message'=> 'no exam and result', 'exam_paper'=> null]);
        }else{
            $result = Result::where(['exam_paper_id'=> $exam_paper->id, 'student_id'=> $student_id, 'classes_id'=> $classes_id])->get();
            // $questions = Question::where('exam_paper_id', $exam_paper->id)->with('question_answers')->inRandomOrder()->get();
        }

        if((count($result) == 0) && ($exam_paper !== null)){
            return view('student.welcome', ['message'=> 'exam and no result', 'exam_paper'=> $exam_paper]);

        }else{
            return view('student.welcome', ['message'=> 'exam and result', 'exam_paper'=> $exam_paper]);
        }
    }

    public function loginForm(){
        return view('student.login');
    }

    public function loginSubmit(Request $request){
        if(Auth::attempt($request->except('_token'))){
            // return response()->json("login success");
            return redirect('student/welcome');
        }else{
            // return response()->json("login error");
            return redirect('student/login')->with('message', 'Error! Incorrect credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('student/login');
    }
}
