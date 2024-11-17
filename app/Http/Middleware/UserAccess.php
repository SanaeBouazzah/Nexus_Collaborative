<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    // Check if the current request is for the 'index' action
    if ($request->route()->getName() === 'courses.index') {
        return $next($request);
    }

    // Check if the user is authenticated
    if (!$request->user()) {
        abort(404);
    }

    if ($request->route()->getName() === 'courses.show') {
      // Allow authenticated users to access the show page
      return $next($request);
  }

    // Check the user's role
    if ($request->user()->user_type === 'admin' ||  $request->user()->user_type === 'teacher') {
        // Admin and teacher can access all actions
        return $next($request);
    } else {
        // Unauthenticated users and normal users cannot access non-index actions
        abort(404);
    }
}
}
