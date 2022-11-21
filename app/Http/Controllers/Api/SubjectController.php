<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Subject::all()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_subjects = [];
        foreach ($request->all() as $index => $subject) {
            array_push($created_subjects, Subject::create($subject));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_subjects], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Subject::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Subject::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Subject::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            Subject::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Subject::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function querySubjectTable(Request $request)
    {
        return response()->json(Subject::where($request->all())->get());
    }
}

