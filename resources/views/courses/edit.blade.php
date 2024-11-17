<x-app-layout>
  <div class="container">
    <div class="create-course  cn-tp">
      <h1>Edit Course {{ __('By a Teacher') }}</h1>
      <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data"
          class="course-form">
          @csrf
          @method('PUT')
          <div class="flex gap group-flex">
              <div class="form-group">
                  <input type="text" placeholder="Title" name="title" class="form-control"
                      value="{{ old('title', $course->title) }}">
              </div>
              <div class="form-group">
                  <input type="text" placeholder="Subtext" name="subtext"
                      value="{{ old('subtext', $course->subtext) }}">
              </div>
          </div>
          <div class="flex gap group-flex">
              <div class="form-group current-image">
                  @if ($course->image)
                      <img src="{{ asset($course->image) }}" alt="{{ $course->title }}"
                          class="w-32 h-32 object-cover">
                  @else
                      <p>No image uploaded</p>
                  @endif
              </div>
              <div class="form-group">
                  <input type="file" name="image" class="form-control">
              </div>
          </div>
          <div class="flex gap group-flex">
              <div class="form-group">
                  <input type="text" placeholder="Price By Dollar $" name="price"
                      value="{{ old('price', $course->price) }}">
              </div>
              <div class="form-group">
                  <input type="text" placeholder="Hours" name="hours" value="{{ old('hours', $course->hours) }}">
              </div>
          </div>
          <div class="form-group">
              <textarea type="text" placeholder="Description" name="description">{{ old('description', $course->description) }}</textarea>
          </div>
          <div class="form-group">
              <button type="submit">Update Course</button>
          </div>
      </form>
  </div>
  </div>
</x-app-layout>
