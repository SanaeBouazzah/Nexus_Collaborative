<x-app-layout>
    <div class="container">
      <div class="create-course  cn-tp">
        <h1>Create Course {{ __('By a Teacher') }}</h1>
        <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex gap group-flex">
                <div class="form-group">
                    <input type="text" placeholder="Title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Subtext" name="subtext">
                </div>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="flex gap group-flex">
                <div class="form-group">
                    <input type="text" placeholder="Price By Dollar $" name="price">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Hours" name="hours">
                </div>
            </div>
            <div class="form-group">
              <textarea type="text" placeholder="Description" name="description"></textarea>
          </div>
            <div class="form-group">
                <button type="submit">Create Course</button>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
