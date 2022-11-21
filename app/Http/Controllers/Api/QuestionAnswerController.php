<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\QuestionAnswer;

class QuestionAnswerController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> QuestionAnswer::all()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_answers = [];
        foreach ($request->all() as $index => $answer) {
            array_push($created_answers, QuestionAnswer::create($answer));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_answers], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> QuestionAnswer::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            QuestionAnswer::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> QuestionAnswer::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            QuestionAnswer::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> QuestionAnswer::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryQuestionAnswerTable(Request $request)
    {
        // return response()->json($request->all());
        return response()->json(QuestionAnswer::where($request->all())->get());
    }
}
