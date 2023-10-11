<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ExamPaper;
use App\Models\Result;
use App\Models\Question;
use App\Models\QuestionAnswer;

class ExamController extends Controller
{
    public function exam_view(){
        $user = Auth::user();
        $student = $user->student;

        $exam_paper = ExamPaper::where(['classes_id'=>  $student->classes_id])->whereRaw("(SUBTIME(start_time, '00:30:00') <= NOW()) and (ADDTIME(start_time, '00:30:00') >= NOW())")->first();

        if($exam_paper == null){
            return view('student.welcome', ['message'=> 'no exam and result', 'exam_paper'=> null]);
        }

        return view('student.exam', ['exam_paper'=> $exam_paper]);
    }

    public function set_exam(Request $request){
        // return response()->json($request->all());
        $user = Auth::user();
        $student = $user->student;

        $exam_paper = ExamPaper::where(['classes_id'=>  $student->classes_id])->whereRaw("(SUBTIME(start_time, '00:30:00') <= NOW()) and (ADDTIME(start_time, '00:30:00') >= NOW())")->inRandomOrder()->first();
        if($exam_paper === null){
            // $result = null;
            // $questions = [];
            
            return redirect('student/welcome')->with('message', 'no exam and result');
        }else{
            $result = Result::where(['exam_paper_id'=> $exam_paper->id, 'student_id'=> $student->id, 'classes_id'=> $student->classes_id])->get();
            $questions = Question::where('exam_paper_id', $exam_paper->id)->with('question_answers_no_correct')->without('question_answers')->inRandomOrder()->get();
        }

        // return $questions;

        // return response()->json(['result'=> $result, 'exam_paper'=> $exam_paper, 'questions'=> $questions]);

        return view('student.set-exam', ['result'=> $result, 'exam_paper'=> $exam_paper, 'questions'=> $questions]);

        // return view('student.exam', ['result'=> $result, 'exam_paper'=> $exam_paper, 'questions'=> $questions]);

    }

    public function submit_exam(Request $request){
        // return $request->all();
        $submitted_answers = json_decode($request->answered_questions);

        // $classes_id = $request->classes_id;
        $subject_id = $request->subject_id;
        $year_id = $request->year_id;
        $term_id = $request->term_id;
        $exam_id = $request->exam_id;
        $exam_paper_id = $request->exam_paper_id;

        $over = count($submitted_answers);
        $score = 0;
        $total_answered = 0;

        // return $submitted_answers;

        foreach ($submitted_answers as $key => $answered) {
            if($answered->answered){
                $answer = QuestionAnswer::find($answered->id);
                
                if($answer->correct){
                    $score++;
                }

                $total_answered++;
            }
        }

        // return $score;

        $total_wrong = $over - $score;

        $exam_paper = ExamPaper::find($exam_paper_id);

        $result = Result::where(['exam_paper_id'=> $exam_paper_id, 'student_id'=> Auth::user()->student->id, 'classes_id'=> Auth::user()->student->classes_id])->get();
        if(count($result) > 0){
            return view('student.welcome', ['message'=> 'exam and result', 'exam_paper'=> null]);
        }

        $result_data = [
            'student_id'=> Auth::user()->student->id,
            'exam_id'=> $exam_id,
            'subject_id'=> $subject_id,
            'classes_id'=> Auth::user()->student->classes_id,
            'exam_paper_id'=> $exam_paper_id,
            'year_id'=> $year_id,
            'term_id'=> $term_id,
            'score'=> $score,
            'over'=> $over
        ];

        Result::create($result_data);

        return view('student.exam-result', ['score'=> $score, 'over'=> $over, 
            'total_answered'=> $total_answered, 'total_wrong'=> $total_wrong,
            'exam_paper'=> $exam_paper
        ]);
    }
}
