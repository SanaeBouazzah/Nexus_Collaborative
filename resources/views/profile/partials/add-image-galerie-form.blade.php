<header>
  <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      {{ __('Profile Gallery') }}
  </h2>
  <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      {{ __('Add Pictures to your Gallery') }}
  </p>
</header>

<form action="{{ route('profile.addImageGallery') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <label for="image">Upload Images:</label>
  <input type="file" name="image" id="image"  required>
  <button type="submit">Upload</button>
</form>
