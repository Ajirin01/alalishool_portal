<?php

namespace App\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Student::all()], status:Response::HTTP_OK);
        
        // return response()->json(['message'=> 'success', 'data'=> Student::with('user', 'classes')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json(['message'=> 'Record successfully created!', 'data'=> Student::create($request->all())], status:Response::HTTP_CREATED);

    }

    public function show($id)
    {
        // return response()->json(['message'=> 'success', 'data'=> Student::with('user')->where('id', $id)->first()], status:Response::HTTP_OK);
        return response()->json(['message'=> 'success', 'data'=> Student::find($id)->first()], status:Response::HTTP_OK);
        // return response()->json(['message'=> 'success', 'data'=> Student::with('user', 'classes')->where('id',$id)->first()], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Student::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Student::with('user')->where('id',$id)->first()], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            $student = Student::find($id);   
            $student->user()->delete();
            $student->record()->delete();
            $student->delete();
            // return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Student::with('user')->where('id', $id)->get()], status:Response::HTTP_OK);
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Student::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryStudentTable(Request $request)
    {
        return response()->json(Student::where($request->all())->get());
    }

    public function promoteStudents(Request $request)
    {
        foreach($request->ids as $id){
            try {
                $student = Student::find($id)->update(['classes_id'=> $request->classes_id]);
            } catch (\Throwable $th) {
                return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
            }
        }
        return response()->json(['message'=> 'Students Successfullu Promoted!'], status:Response::HTTP_OK);
    }
}
