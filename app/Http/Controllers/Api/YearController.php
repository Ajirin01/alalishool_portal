<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\Year;


class YearController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Year::all()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_years = [];
        foreach ($request->all() as $index => $year) {
            array_push($created_years, Year::create($year));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_years], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Year::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Year::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Year::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            Year::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Year::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
}