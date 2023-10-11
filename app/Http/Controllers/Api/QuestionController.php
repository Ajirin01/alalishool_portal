<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\Question;
use App\Models\QuestionAnswer;

class QuestionController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Question::paginate(50)], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_questions = [];
        foreach ($request->all() as $index => $question) {
            array_push($created_questions, Question::create($question));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_questions], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Question::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Question::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Question::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            QuestionAnswer::where('question_id', $id)->delete();
            Question::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Question::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryQuestionTable(Request $request)
    {
        return response()->json(Question::where($request->all())->get());
    }
}
