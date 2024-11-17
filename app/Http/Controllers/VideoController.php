<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;

class VideoController extends Controller
{
  /**
   * Display a listing of the video resources.
   *
   * @return \Illuminate\Http\Response
   */
  /**
   * Show the form for creating a new video.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::latest()->get();
    $courses = Course::latest()->get();
    return view('videos.create', compact('users', 'courses'));
  }
  /**
   * Store a newly created video in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'course_id' => 'required',
      'user_id' => 'required',
      'title' => 'required|string',
      'description' => 'required|string',
      'notes' => 'nullable|string',
      'announcements' => 'nullable|string',
      'file_path' => 'required|file|mimes:mp4,mov,avi,flv,wmv', // 100MB max file size
      'duration' => 'required|numeric',
      'order' => 'required',
    ]);

    $videoPath = $request->file('file_path')->store('videos', 'public');


    $video = Video::create([
      'course_id' => $validatedData['course_id'],
      'user_id' => $validatedData['user_id'],
      'title' => $validatedData['title'],
      'description' => $validatedData['description'],
      'notes' => $validatedData['notes'],
      'announcements' => $validatedData['announcements'],
      'file_path' => $videoPath,
      'duration' => $validatedData['duration'],
      'order' => $validatedData['order'],
    ]);

    return redirect()->route('courses.index')->with('success', 'Video created successfully.');
  }
  /**
   * Display the specified video.
   *
   * @param  \App\Models\Video  $video
   * @return \Illuminate\Http\Response
   */
  public function show(Course $course, Video $video)
  {
      $video = Video::find($video); 
      return view('videos.show', compact('course', 'video'));
  }
  /**
   * Show the form for editing the specified video.
   *
   * @param  \App\Models\Video  $video
   * @return \Illuminate\Http\Response
   */
  public function edit(Video $video, Course $course)
  {
    return view('videos.edit', compact('video'));
  }
  /**
   * Update the specified video in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Video  $video
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Video $video)
  {
    $validatedData = $request->validate([
      'title' => 'required|string',
      'description' => 'required|string',
      'notes' => 'required|string',
      'announcements' => 'required|string',
      'duration' => 'required|numeric',
      'order'  => 'required|numeric',
    ]);

    if ($request->hasFile('file_path')) {
      $imageName = time() . '.' . $request->file('file_path')->getClientOriginalExtension();
      $path = $request->file('file_path')->storeAs('videos', $imageName, 'public');
      $validatedData['file_path'] =  $path; 
    }

    $video->update($validatedData);
    return redirect()->route('courses.index')->with('success', 'Video updated successfully.');
  }
  /**
   * Remove the specified video from storage.
   *
   * @param  \App\Models\Video  $video
   * @return \Illuminate\Http\Response
   */
  public function destroy(Video $video)
  {
    $video->delete();
    return redirect()->route('videos.index')->with('success', 'Video deleted successfully.');
  }
}
