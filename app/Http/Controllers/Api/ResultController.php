<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\Result;

class ResultController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Result::with('subject', 'classes', 'year', 'exam_paper', 'student', 'exam', 'term')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json(['message'=> 'Record successfully created!', 'data'=> Result::create($request->all())], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Result::with('subject', 'classes', 'year', 'exam_paper', 'student', 'exam', 'term')->where('id', $id)->first()], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Result::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Result::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            Result::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Result::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryResultTable(Request $request)
    {
        return response()->json(Result::where($request->all())->get());
    }
}
