<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Classes;

class ClassesController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Classes::paginate(20)], status:Response::HTTP_OK);

        // return response()->json(['message'=> 'success', 'data'=> Classes::with('teacher_classes')->get()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_classes = [];
        foreach ($request->all() as $index => $class) {
            array_push($created_classes, Classes::create($class));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_classes], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Classes::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Classes::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Classes::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            Classes::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Classes::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryClassesTable(Request $request)
    {
        return response()->json(Classes::where($request->all())->get());
    }
}
