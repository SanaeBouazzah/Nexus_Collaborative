<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
  public function index($userId)
  {
    $user = User::find($userId);
    $images = Gallery::where('user_id', $userId)->get();
    return view('profile.index', compact('user', 'images'));
  }
  public function edit(Request $request): View
  {
    return view('profile.edit', [
      'user' => $request->user(),
    ]);
  }
  public function update(ProfileUpdateRequest $request): RedirectResponse
  {
    $request->user()->fill($request->validated());

    if ($request->user()->isDirty('email')) {
      $request->user()->email_verified_at = null;
    }

    $request->user()->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
  }
  public function updateImage(Request $request)
  {
    $request->validate([
      'image' => 'nullable|image',
      'bio' => 'nullable'
    ]);


    $user = auth()->user();
    if ($request->hasFile('image')) {
      $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
      $path = $request->file('image')->storeAs('images', $imageName, 'public');
      $user->image = '/storage/' . $path;
    }
    $user->bio = $request->input('bio');
    $user->save();

    return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
  }
  public function updateBackground(Request $request, $userId)
  {
    $user = User::findOrFail($userId);

    $validatedData = $request->validate([
      'backgroundimage' => 'nullable|image',
    ]);

    if ($request->hasFile('backgroundimage')) {
      if ($user->backgroundimage && $user->backgroundimage !== 'backgroundimage.jpg') {
        $oldBackgroundPath = 'storage/myapp/' . $user->backgroundimage;
        if (File::exists(public_path($oldBackgroundPath))) {
          File::delete(public_path($oldBackgroundPath));
        }
      }

      $backgroundImage = $request->file('backgroundimage');
      $backgroundImagePath = $backgroundImage->store('myapp', 'public');
      $user->backgroundimage = basename($backgroundImagePath);
    } else {
      $user->backgroundimage = 'backgroundimage.jpg';
    }

    $user->save();

    return redirect()->route('profile.index', $user->id)->with('success', 'Profile updated successfully.');
  }
  public function addImageGallery(Request $request): RedirectResponse
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
  ]);

  if ($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = time() . '_' . $file->getClientOriginalName();
    $path = $file->storeAs('gallery', $filename, 'public');

          Gallery::create([
            'user_id' => Auth::id(), 
            'image' => $path,
        ]);
      }
    return Redirect::to('/');
  }
  public function destroy(Request $request): RedirectResponse
  {
    $request->validateWithBag('userDeletion', [
      'password' => ['required', 'current_password'],
    ]);

    $user = $request->user();

    Auth::logout();

    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::to('/');
  }
}
