<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nexus Collaborative') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/myapp/graduate.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dash">
    <div class="content_dashboard">
        <div class="flex">
            <div class="s-components">
                <div class="user-image"><img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                </div>
                <h1>Teacher</h1>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ Request::is('events') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('teacher.partials.statics-teacher') }}"
                            class="{{ Request::is('events') ? 'active' : '' }}">Statics</a></li>
                    @auth
                        <li><a href="{{ route('profile.index', auth()->user()->id) }}"
                                class="{{ Request::is('events') ? 'active' : '' }}">My Profile</a></li>
                    @endauth
                    <li><a href="{{ route('components.allteachers') }}"
                            class="{{ Request::is('teachers') ? 'active' : '' }}">Teachers</a></li>
                    <li><a href="{{ route('components.users') }}"
                            class="{{ Request::is('Admins') ? 'active' : '' }}">Admins</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Events</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Enrollements</a></li>
                    <li><a href="{{ route('components.procourses') }}"
                            class="{{ Request::is('events') ? 'active' : '' }}">Pro Courses</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Competitions</a></li>
                    <li><a href="{{ route('profile.edit') }}"
                            class="{{ Request::is('profile') ? 'active' : '' }}">Settings</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="s-content-teacher">
                <div class="tp-left">
                  @include('teacher.partials.statics-teacher')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
