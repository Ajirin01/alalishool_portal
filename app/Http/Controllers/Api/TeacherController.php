<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\TeacherSubject;
use App\Models\TeacherClasses;
use App\Models\User;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Teacher::with('user')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json(['message'=> 'Record successfully created!', 'data'=> Teacher::create($request->all())], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Teacher::with('user')->where('id',$id)->first()], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Teacher::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Teacher::with('user')->where('id',$id)->first()], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            $teacher = Teacher::find($id);

            $user = User::where('id', $teacher->user_id)->delete();
            TeacherSubject::where('teacher_id', $id)->delete();
            TeacherClasses::where('teacher_id', $id)->delete();

            $teacher->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Teacher::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryTeacherTable(Request $request)
    {
        return response()->json(Teacher::where($request->all())->get());
    }
}
