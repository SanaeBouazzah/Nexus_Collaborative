<div class="s-components" id="myElement">
    <div class="user-image"><img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
    </div>
    <h1>Student</h1>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{route('user.statics-user')}}">Statics</a></li>
        @auth
            <li><a href="{{ route('profile.index', auth()->user()->id) }}">My Profile</a></li>
        @endauth
        <li><a href="{{route('user.badge')}}">Badges</a></li>
        <li><a href="{{route('action')}}">Followers</a></li>
        <li><a href="{{route('action')}}" >Events</a></li>
        <li><a href="{{route('action')}}">Enrollements</a></li>
        <li><a href="{{ route('components.procourses') }}">Pro Courses</a></li>
        <li><a href="{{route('action')}}">Competitions</a></li>
        <li><a href="{{ route('profile.edit') }}">Settings</a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="">Log Out</button>
            </form>
        </li>
    </ul>
</div>
