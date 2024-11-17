<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $courses = Course::all();
    $users = User::all();
    $usersCount = User::count();
    $teachersCount = User::where('user_type', 'teacher')->count();
    $teachers = User::where('user_type', 'teacher')->latest('id')->get();
    $adminsCount = User::where('user_type', 'admin')->count();
    $currentMonthUsers = User::whereMonth('created_at', Carbon::now()->month)
      ->whereYear('created_at', Carbon::now()->year)
      ->count();
      $search = $request->input('search');
      $courses = Course::where(function($query) use ($search) {
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('subtext', 'like', "%{$search}%");
       })->get();
    return view('user.statics-user', compact(
      'courses',
      'users',
      'usersCount',
      'teachersCount',
      'adminsCount',
      'currentMonthUsers',
      'teachers',
      'search'
    ));

  }
  public function badge()
  {
    return view('user.badge');
  }

}
