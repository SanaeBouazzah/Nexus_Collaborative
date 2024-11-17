<x-app-layout>
    <div class="container">
      <div class="create-course create-video">
        <div class="card-header">
            <h1>Edit a Section - Order : {{ $video->order }}</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('videos.update', $video->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title', $video->title) }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body_flex gap">
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                        <div class="col-md-6">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required
                                autocomplete="description">{{ old('description', $video->description) }}</textarea>

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
                            <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" autocomplete="notes">{{ old('notes', $video->notes) }}</textarea>

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
                        <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>

                        <div class="col-md-6">
                            <input id="duration" type="number" step="0.01"
                                class="form-control @error('duration') is-invalid @enderror" name="duration"
                                value="{{ old('duration', $video->duration) }}" required autocomplete="duration">

                            @error('duration')
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
                                value="{{ old('order', $video->order) }}" required autocomplete="order">

                            @error('order')
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
                            autocomplete="announcements">{{ old('announcements', $video->announcements) }}</textarea>

                        @error('announcements')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group row">
                        <label for="file_path" class="col-md-4 col-form-label text-md-right">File
                            Path</label>
                        <div class="col-md-6">
                            <input id="file_path" type="file" class="form-control" name="file_path">

                        </div>
                    </div>
                    <div class="video">
                        @if ($video->file_path)
                            <div class="form-group row">
                                <video controls>
                                    <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @else
                            <p>No Video uploaded</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Edit Section
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-app-layout>

<style>
    .card-body_flex {
        display: flex;
        justify-content: space-between;
    }

    .card-body_flex-video {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body_flex .select {
        text-align: right;
    }

    input[type='number'] {
        border: none;
        outline: none;
        border: 1px solid #ccc;
        width: 100%;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .video video {
        max-width: 500px;
        border-radius: 10px;
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
        .video video {
        max-width: 500px;
        width:100%;
        height: 170px;
    }
    }
</style>
