<x-app-layout>
    <div class="container">
        <div class="create-course create-video">
            <div class="card-header">
                <h1>Create New Section</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body_flex gap">
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Teacher</label>
                            <input value="{{ Auth::user()->name }}" type="text" disabled>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row select">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">Course</label>

                            <div class="col-md-6">
                                <select id="course_id" class="form-control" @error('course_id') is-invalid @enderror"
                                    name="course_id" required autocomplete="course_id">
                                    <option value="">Select a Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>

                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body_flex gap">
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required
                                    autocomplete="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>

                            <div class="col-md-6">
                                <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" autocomplete="notes">{{ old('notes') }}</textarea>

                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="card-body_flex gap">
                        <div class="form-group row">
                            <label for="file_path" class="col-md-4 col-form-label text-md-right">File
                                Path</label>

                            <div class="col-md-6">
                                <input id="file_path" type="file"
                                    class="form-control @error('file_path') is-invalid @enderror" name="file_path"
                                    value="{{ old('file_path') }}" required autocomplete="file_path">

                                @error('file_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" step="0.01"
                                    class="form-control @error('duration') is-invalid @enderror" name="duration"
                                    value="{{ old('duration') }}" required autocomplete="duration">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="announcements" class="col-md-4 col-form-label text-md-right">Announcements</label>

                        <div class="col-md-6">
                            <textarea id="announcements" class="form-control @error('announcements') is-invalid @enderror" name="announcements"
                                autocomplete="announcements">{{ old('announcements') }}</textarea>

                            @error('announcements')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order" class="col-md-4 col-form-label text-md-right">Order</label>

                        <div class="col-md-6">
                            <input id="order" type="number" step="0.01"
                                class="form-control @error('order') is-invalid @enderror" name="order"
                                value="{{ old('order') }}" required autocomplete="order">

                            @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create Video
                            </button>
                        </div>
                    </div>
                    <a class="editsec" href="">Edit Sections-></a>
                </form>
            </div>
        </div>
</x-app-layout>

<style>
     .editsec{
      color:green;
      display: block;
      text-decoration: underline
     }
    .card-body_flex {
        display: flex;
        justify-content: space-between;
    }

    .card-body_flex .select {
        text-align: left;
    }

    .card-body_flex .select select {
        max-width: 500px;
        width: 100%;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    input[type='number'] {
        border: none;
        outline: none;
        border: 1px solid #ccc;
        width: 100%;
    }

    .card-header {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 1rem 1.5rem;
    }

    .form-control {
        border-radius: 6px;
        padding: 0.75rem 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 6px;
        padding: 0.75rem 1.5rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004a9b;
    }

    @media (max-width:768px) {
        .create-video .card-body_flex {
            flex-direction: column;
        }

        .card-body_flex .select {
            text-align: left;
        }

        .card-body_flex .select select {
            max-width: 500px;
            width: 100%;
        }
    }
</style>
