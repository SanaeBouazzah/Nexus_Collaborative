<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

///// USER
Route::get('/dashboard/statics', [UserController::class, 'index'])
->middleware(['auth', 'verified', 'user'])->name('user.statics-user');
Route::get('/dashboard', [UserController::class, 'index'])
->middleware(['auth', 'verified', 'user'])->name('dashboard');
Route::get('/dashboard/badges', [UserController::class, 'badge'])
->middleware(['auth', 'verified', 'user'])->name('user.badge');



/////Profile
Route::middleware('auth')->group(function () {
  Route::get('/profile/settings', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::put('/profile', [ProfileController::class, 'updateImage'])->name('profile.update');
  Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
  Route::put('/profile/{user}/updateBackground', [ProfileController::class, 'updateBackground'])->name('profile.updateBackground');
  Route::post('/profile/addimage', [ProfileController::class, 'addImageGallery'])->name('profile.addImageGallery');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('courses', CourseController::class);
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show')->middleware('auth');


Route::get('courses/{course}/video/{video}', [CourseController::class, 'appear'])->name('courses.appear');
Route::resource('videos', VideoController::class);


// Route::resource('courses', CourseController::class)->middleware('allow.index-only');
Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard')
  ->middleware(['auth', 'verified', 'teacher']);
Route::get('teachers', [TeacherController::class, 'display'])->name('teacher.display');
Route::middleware('auth', 'verified', 'teacher')->group(function () {
  Route::get('teacher/dashboard/statics', [TeacherController::class, 'index'])->name('teacher.partials.statics-teacher');
});

///// ADMIN
Route::middleware('auth', 'verified', 'admin')->group(function () {
  Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
  Route::put('admin/dashboard', [AdminController::class, 'edit'])->name('users.edit');
  Route::put('admin/dashboard/{user}', [AdminController::class, 'update'])->name('users.update');
  Route::delete('admin/dashboard/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
  Route::get('/admin/dashboard/statics', [AdminController::class, 'index'])->name('components.statics');
  Route::get('/admin/dashboard/procourses', [AdminController::class, 'procourses'])->name('components.procourses');
  Route::get('/admin/dashboard/allteachers', [AdminController::class, 'allteachers'])->name('components.allteachers');
  Route::get('/admin/dashboard/users', [AdminController::class, 'users'])->name('components.users');
});


///////////////////events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/underconstruction', [WelcomeController::class, 'action'])->name('action');
Route::middleware('track.visitor')->group(function () {
  Route::get('/visitors', [VisitorController::class, 'index']);
});




require __DIR__ . '/auth.php';
