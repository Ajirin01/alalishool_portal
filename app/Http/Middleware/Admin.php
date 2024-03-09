<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()){
            if(Auth::user()->role == "admin" || Auth::user()->role == "teacher" || Auth::user()->role == "student"){
                return $next($request);
            }else{
                Auth::logout();
                return redirect(route('portal-login'));
            }
    
        }else{
            return redirect(route('portal-login'));
        }

        
    }
}
