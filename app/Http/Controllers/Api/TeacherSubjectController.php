<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\TeacherSubject;

class TeacherSubjectController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> TeacherSubject::with('teacher', 'subject')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_subjects = [];
        foreach ($request->all() as $index => $subject) {
            array_push($created_subjects, TeacherSubject::create($subject));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_subjects], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> TeacherSubject::with('teacher', 'subject')->where('id',$id)->first()], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            TeacherSubject::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> TeacherSubject::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            TeacherSubject::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> TeacherSubject::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryTeacherSubjectTable(Request $request)
    {
        return response()->json(TeacherSubject::where($request->all())->get());
    }
}
