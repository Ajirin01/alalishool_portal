<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Exam::paginate(20)], status:Response::HTTP_OK);
        // return response()->json(['message'=> 'success', 'data'=> Exam::with('year', 'term')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json(['message'=> 'Record successfully created!', 'data'=> Exam::create($request->all())], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Exam::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Exam::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Exam::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            Exam::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Exam::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryExamTable(Request $request)
    {
        return response()->json(Exam::where($request->all())->inRandomOrder()->get());
    }
    
}
