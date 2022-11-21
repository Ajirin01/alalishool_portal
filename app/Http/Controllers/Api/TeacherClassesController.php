<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\TeacherClasses;

class TeacherClassesController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> TeacherClasses::with('teacher.user', 'classes')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_classes = [];
        foreach ($request->all() as $index => $subject) {
            array_push($created_classes, TeacherClasses::create($subject));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_classes], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> TeacherClasses::with('teacher.user', 'classes')->where('id', $id)->first()], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            TeacherClasses::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> TeacherClasses::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            TeacherClasses::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> TeacherClasses::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryTeacherClassesTable(Request $request)
    {
        return response()->json(TeacherClasses::where($request->all())->get());
    }
}

