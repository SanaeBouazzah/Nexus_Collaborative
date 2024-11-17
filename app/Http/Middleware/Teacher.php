<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Teacher
{
    public function handle(Request $request, Closure $next): Response
    {
      if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->user_type === 'admin') {
      return redirect()->route('admin.dashboard');
    }elseif(Auth::user()->user_type === 'teacher'){
      return $next($request);
    }else{
      return redirect()->route('dashboard');
    }
    }
}