<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
// use Cookie;

class AuthController extends Controller
{
    public function loginForm(){
        return view('admin.auth.login');
    }

    public function loginSubmit(Request $request){
        if(Auth::attempt($request->except('_token'))){
            // return response()->json("login success");
            return redirect('admin/dashboard');
        }else{
            // return response()->json("login error");
            return redirect('admin/login')->with('message', 'Error! Incorrect credentials');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('admin/login');
    }
}
