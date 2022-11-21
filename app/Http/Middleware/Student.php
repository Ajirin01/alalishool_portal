<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class Student
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()){
            if(Auth::user()->role == "student"){
                return $next($request);
            }else{
                Auth::logout();
                return redirect(route('student-login'));
            }
    
        }else{
            return redirect(route('student-login'));
        }

        
    }
}
