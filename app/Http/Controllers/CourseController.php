<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
  public function index(Request $request)
  {
    $courses = Course::latest('id')->get();
    $search = $request->input('search');
    $courses = Course::where(function($query) use ($search) {
      $query->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('subtext', 'like', "%{$search}%");
     })->get();
    return view('courses.index', compact('courses', 'search'));
  }
  public function create()
  {
    if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin') {
      return view('courses.create');
    } else {
      abort(404);
    }
  }
  public function store(Request $request)
  {
    if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin') {
      $request->validate([
        'title' => 'required',
        'description' => 'required',
        'subtext' => 'required',
        'price' => 'required',
        'hours' => 'required',
        'image' => 'required|image',
      ]);

      $user = auth()->user();

      if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('courses', $imageName, 'public');
        $imagePath = '/storage/' . $path;
      }

      $user->courses()->create([
        'title' => $request->title,
        'description' => $request->description,
        'subtext' => $request->subtext,
        'price' => $request->price,
        'hours' => $request->hours,
        'image' => $imagePath,
      ]);

      Session::flash('success', 'Course created successfully');
      return redirect()->route('courses.index');
    } else {
      abort(404);
    }
  }
  public function show(Course $course)
  {
    $videos = $course->videos;
    return view('courses.show', compact('course', 'videos'));
  }
  public function appear(Course $course, Video $video)
  {
    $videos = $course->videos()->orderBy('order', 'asc')->get();
    return view('courses.appear', compact('course', 'video', 'videos'));
  }
  public function edit(Course $course)
  {
    if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin') {
      $courses = Course::find($course);
      return view('courses.edit', ['course' => $course]);
    } else {
      abort(404);
    }
  }
  public function update(Request $request, Course $course)
  {
    if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin') {
      $request->validate([
        'title' => 'required',
        'description' => 'required',
        'subtext' => 'required',
        'price' => 'required',
        'hours' => 'required',
        'usertype' => 'teacher',
      ]);

      $data = $request->all();

      if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('courses', $imageName, 'public');
        $data['image'] = '/storage/' . $path;
      }

      $course->update($data);
      return redirect()->route('courses.index');
    } else {
      abort(404);
    }
  }
  public function destroy(Course $course)
  {
    if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin') {
      $course->delete();
      return redirect()->route('courses.index');
    } else {
      abort(404);
    }
  }
}
