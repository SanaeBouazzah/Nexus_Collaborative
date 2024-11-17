@extends('admin.dashboard')

@section('s-contents')
<table>
  <thead>
      <th>Course Name</th>
      <th>Description</th>
      <th>Subtext</th>
      <th>Price</th>
      <th>Teacher</th>
      <th>Date</th>
      <th>Time</th>
      <th>Actions</th>
  </thead>
  @foreach ($courses as $course)
      <tbody>
          <td><a href="{{ route('courses.show', $course) }}">{{ $course->title }}</a></td>
          <td>{{ $course->description }}</td>
          <td>{{ Str::limit($course->subtext, 30, '...') }}</td>
          <td>{{ $course->price }}$</td>
          <td>
              <div class="flex gap">
                  {{ $course->user->name }}
                  <img src="{{ asset($course->user->image) }}" alt="" width="50px"
                      height="50px">
              </div>
          </td>
          <td>{{ date('l, F j, Y', strtotime($course->created_at)) }}</td>
          <td>{{ date('H:i:s', strtotime($course->created_at)) }}</td>
          <td>
              <div class="flex gap">
                  <a href="{{ route('courses.edit', $course) }}" class="b-green p-3">Edit</a>
                  <form action="{{ route('courses.destroy', $course) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="b-green">Delete</button>
                  </form>
              </div>
          </td>
      </tbody>
  @endforeach
</table>
@endsection