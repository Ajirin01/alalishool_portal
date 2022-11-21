<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use DB;

use App\Models\ExamPaper;

class ExamPaperController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> ExamPaper::with('classes', 'subject', 'exam')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json(['message'=> 'Record successfully created!', 'data'=> ExamPaper::create($request->all())], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> ExamPaper::with('classes', 'subject', 'exam')->where('id',$id)->first()], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            ExamPaper::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> ExamPaper::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            ExamPaper::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> ExamPaper::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryExamPaperTable(Request $request)
    {
        return response()->json(ExamPaper::where($request->all())->get());
    }

    public function getExamPaperByClassAndTimeRange(Request $request)
    {
        return response()->json(ExamPaper::with('exam.year', 'subject', 'exam.term')->where($request->all())->whereRaw("(SUBTIME(start_time, '00:30:00') <= NOW()) and (ADDTIME(start_time, '00:30:00') >= NOW())")->get());
        
        // return response()->json(ExamPaper::where($request->all())->where("start_time", "+ 60 <=", Carbon::now('WAT')->format('Y-m-d H:i:s'))->Where( "start_time", " - 60 >=", Carbon::now('WAT')->format('Y-m-d H:i:s'))->get());
    }
}
