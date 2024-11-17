<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
      if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->user_type === 'admin') {
        return $next($request);
    }elseif(Auth::user()->user_type === 'teacher'){
      return redirect()->route('teacher.dashboard');
    }else{
      return redirect()->route('dashboard');
    }

    }
}