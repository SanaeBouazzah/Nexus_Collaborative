<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nexus Collaborative - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/myapp/graduate.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dash">
    <div class="content_dashboard">
        <div class="flex">
            <div class="s-components" id="myElement">
                <div class="user-image"><img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                </div>
                <h1>Admin</h1>
                <ul class="list-dashboard">
                    <li><a href="{{ route('home') }}" class="">Home</a></li>
                    <li><a href="{{ route('components.statics') }}" class="">Statics</a></li>
                    @auth
                        <li><a href="{{ route('profile.index', auth()->user()->id) }}"
                                class="{{ Request::is('profile') ? 'active' : '' }}">My Profile</a></li>
                    @endauth
                    <li><a href="{{ route('components.allteachers') }}"
                            class="{{ Request::is('allteachers') ? 'active' : '' }}">All Teachers</a></li>
                    <li><a href="{{ route('components.users') }}"
                            class="{{ Request::is('users') ? 'active' : '' }}">Users</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Events</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Enrollements</a></li>
                    <li><a href="{{ route('components.procourses') }}"
                            class="{{ Request::is('events') ? 'active' : '' }}">Pro Courses</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Competitions</a></li>
                    <li><a href="{{ route('profile.edit') }}"
                            class="{{ Request::is('settings') ? 'active' : '' }}">Settings</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="s-content">
                <div class="tp-left">
                    @yield('s-contents')
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('ul li a');
            const currentUrl = window.location.pathname;
            const segments = currentUrl.split('/');
            const lastSegment = segments.pop() || segments[segments.length - 1].trim().replace(/\s+/g, '');

            links.forEach(link => {
                const linkText = link.textContent.replace(/\s+/g, '');
                if (linkText.toLowerCase() === lastSegment.toLowerCase()) {
                    link.classList.add('active');
                }
            });
        });




        const button = document.getElementById('myButton');
        const myElement = document.getElementById('myElement');

        function handleClick(event) {
            if (window.innerWidth < 1200) {
                event.stopPropagation();
                myElement.style.display = 'block';
            }
        }

        function handleDocumentClick() {
            if (window.innerWidth < 1200) {
                myElement.style.display = 'none';
            }
        }

        button.addEventListener('click', handleClick);
        document.addEventListener('click', handleDocumentClick);
    </script>
</body>

</html>
