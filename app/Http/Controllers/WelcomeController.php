<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function index()
  {
    $users = User::all();
      $courses = Course::all();
      return view('welcome', compact('courses', 'users'));
  }
  public function action(){
    return view('action');
  }
}
