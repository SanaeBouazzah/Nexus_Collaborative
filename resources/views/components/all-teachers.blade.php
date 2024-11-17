@extends('admin.dashboard')

@section('s-contents')
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>teachers</th>
                <th>Role</th>
                <th>Bio</th>
                <th>Number of Courses</th>
                <th>Age</th>
                <th>email</th>
                <th>created at</th>
                <th>Delete User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><img src="{{ asset($user->image) }}" alt="{{ $user->name }}"width="50px" height="50px"></td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <form action="{{ route('users.update', $user) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{ $user->user_type }}" name="user_type">
                        </form>
                    </td>
                    <td>{{ Str::limit($user->bio, 50, '...') }}</td>
                    {{-- <td>
                        @foreach ($users as $user)
                            <p>{{ $user->courses_count }}</p>
                        @endforeach
                    </td> --}}
                    <td></td>
                    <td></td>
                    <td>{{$user->email}}</td>
                    <td>{{ $user->created_at->format('Y/m/d') }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete User</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
