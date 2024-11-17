<header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Profile Image') }}
    </h2>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Update your account\'s profile image.') }}
    </p>
</header>

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')
    <div class="form-group">
        @if ($user->image)
            <div class="image">
                <img src="{{ asset($user->image) }}" alt="Current Avatar" class="py-3" style="max-width: 200px;">
            </div>
        @else
            <div class="image">
                <img src="{{ asset('storage/images/profile.png') }}" alt="Default Avatar" class="img-thumbnail"
                    style="max-width: 200px;">
            </div>
        @endif
        <div style="display: flex; justify-content: center;">
            <input type="file" class="form-control-file mt-6" id="image" name="image"
                style="text-align: center; width:230px;">
        </div>
        <div class="bio">
          <h3>Bio</h3>
          <textarea name="bio" id="" cols="30" rows="10">{{$user->bio}}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
