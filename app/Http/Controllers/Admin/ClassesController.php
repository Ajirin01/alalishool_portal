<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Classes;

class ClassesController extends Controller
{
    public function index(){
        $classes = Classes::all();
        return view("admin.classes.index", ['classes'=> $classes, 'noun'=> 'classe']);
    }
}
