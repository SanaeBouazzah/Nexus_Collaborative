<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index(Course $course){
    $courses = Course::where('user_id', Auth::id())->get();
    $users = User::all();
    $usersCount = User::count();
    $teachersCount = User::where('user_type', 'teacher')->count();
    $teachers = User::where('user_type', 'teacher')->latest('id')->get();
    $adminsCount = User::where('user_type', 'admin')->count();
    $currentMonthUsers = User::whereMonth('created_at', Carbon::now()->month)
      ->whereYear('created_at', Carbon::now()->year)
      ->count();
    return view('teacher.dashboard', compact(
      'courses',
      'users',
      'usersCount',
      'teachersCount',
      'adminsCount',
      'currentMonthUsers',
      'teachers'
    ));
    }
    public function display(Request $request)
    {
      $teachers = User::where('user_type', 'teacher')->latest('id')->get();
      return view('teacher.display', compact('teachers'));
    }

}
