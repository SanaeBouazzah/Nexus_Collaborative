<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminController extends Controller
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
      $totalVisitors = Visitor::distinct('ip_address')->count('ip_address');
      $search = $request->input('search');
      $courses = Course::where(function($query) use ($search) {
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('subtext', 'like', "%{$search}%");
       })->get();
    return view('components.statics', compact(
      'courses',
      'users',
      'usersCount',
      'teachersCount',
      'adminsCount',
      'currentMonthUsers',
      'teachers',
      'search',
      'totalVisitors'
    ));
  }
  public function procourses()
  {
    $courses = Course::all();
    $users = User::all();
    // $users = User::where('user_type', 'teacher')->get();
    return view('components.pro-courses', compact('courses', 'users'));
  }
  public function allteachers()
  {
    $users = User::where('user_type', 'teacher')->withCount('courses')->get();
    return view('components.all-teachers', compact('users'));
  }
  public function users()
  {
    $users = User::get();
    return view('components.users', compact('users'));
  }
  public function edit()
  {
    return view('users.edit');
  }
  public function update(Request $request, User $user)
  {
    $data = $request->validate([
      'user_type' =>  'required',
    ]);
    $user->update($data);
    return redirect()->route('admin.dashboard');
  }
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('courses.index');
  }
}
