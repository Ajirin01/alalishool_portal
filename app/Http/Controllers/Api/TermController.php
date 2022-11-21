<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use App\Models\Term;

class TermController extends Controller
{
    public function index()
    {
        return response()->json(['message'=> 'success', 'data'=> Term::all()], status:Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $created_terms = [];
        foreach ($request->all() as $index => $term) {
            array_push($created_terms, Term::create($term));
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_terms], status:Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json(['message'=> 'success', 'data'=> Term::find($id)], status:Response::HTTP_OK);
    }
    
    public function update(Request $request, $id)
    {
        try {
            Term::find($id)->update($request->all());
            return response()->json(['message'=> 'Record successfully updated!', 'data'=> Term::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }
    
    public function destroy($id)
    {
        try {
            Term::find($id)->delete();
            return response()->json(['message'=> 'Record successfully deleted!', 'data'=> Term::find($id)], status:Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Record not found!', 'data'=> $th], status:Response::HTTP_NOT_FOUND);
        }
    }

    public function queryTermTable(Request $request)
    {
        return response()->json(Term::where($request->all())->get());
    }
}
