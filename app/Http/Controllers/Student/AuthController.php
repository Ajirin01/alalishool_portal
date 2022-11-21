<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function welcome(){
        return view('student.welcome');
    }

    public function loginForm(){
        return view('student.login');
    }

    public function loginSubmit(Request $request){
        if(Auth::attempt($request->except('_token'))){
            // return response()->json("login success");
            return redirect('student/welcome');
        }else{
            // return response()->json("login error");
            return redirect('student/login')->with('message', 'Error! Incorrect credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('student/login');
    }
}
