<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Year;

class YearController extends Controller
{
    public function index(){
        $years = Year::all();
        return view("admin.years.index", ['years'=> $years, 'noun'=> 'year']);
    }
}
