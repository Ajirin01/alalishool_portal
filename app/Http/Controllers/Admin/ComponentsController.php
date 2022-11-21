<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Year;
use App\Models\Term;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\ExamPaper;
use App\Models\Teacher;
use App\Models\Student;


class ComponentsController extends Controller
{
    public function questionAnswerArea(Request $request)
    {
        return view("components.question.question-answer-area", ["answerId"=> $request->answerId,
                                                                "answer"=> $request->answer,
                                                                "correct"=> $request->correct]);
    }

    public function teacherClassesArea(Request $request)
    {
        return view("components.teacher.teacher-classes-area", ["id"=> $request->id,
                                                                "name"=> $request->name]);
    }

    public function teacherSubjectsArea(Request $request)
    {
        return view("components.teacher.teacher-subjects-area", ["id"=> $request->id,
                                                                "name"=> $request->name]);
    }

    public function questionArea(Request $request)
    {
        return view("components.question.question-area", ["questionId"=> $request->questionId,
                                                            "question"=> $request->question]);
    }

    public function questionTableBodyRow(Request $request)
    {
        $question = Question::find($request->id);
        return view("components.question.table-body-row", ["question"=> $question]);
    }

    public function examTableBodyRow(Request $request)
    {
        $exam = Exam::find($request->id);
        return view("components.exam.table-body-row", ["exam"=> $exam]);
    }

    public function teacherTableBodyRow(Request $request)
    {
        $teacher = Teacher::find($request->id);
        $classes = Classes::all();
        $subjects = Subject::all();
        return view("components.teacher.table-body-row", ["teacher"=> $teacher, "subjects"=> $subjects, "classes"=> $classes]);
    }

    public function studentTableBodyRow(Request $request)
    {
        $student = Student::find($request->id);
        $classes = Classes::all();
        return view("components.student.table-body-row", ["student"=> $student, "classes"=> $classes]);
    }

    public function examPaperTableBodyRow(Request $request)
    {
        $exam_paper = ExamPaper::find($request->id);
        return view("components.exam_paper.table-body-row", ["exam_paper"=> $exam_paper]);
    }

    public function generalTableBodyRow3Col(Request $request)
    {
        $noun = $request->noun;
        $key = $request->key;

        if($noun == 'year'){
            $data = Year::find($request->id);
        }elseif($noun == "term"){
            $data = Term::find($request->id);
        }elseif($noun == "subject"){
            $data = Subject::find($request->id);
        }elseif($noun == "classe"){
            $data = Classes::find($request->id);
        }

        return view("components.general.table-body-row-3-col", ["data"=> $data, "noun"=> $noun, "key"=> $key]);
    }
}
