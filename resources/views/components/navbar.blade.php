<div class="navbar">
    <div class="logo">
        <div class="image">
            <a href="{{ route('home') }}">
                <h1>Nexus <b class="b-green">Collaborative</b></h1>
            </a>
        </div>
    </div>
    <ul id="myList">
        <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('courses.index') }}"
                class="{{ Request::is('courses*') || Request::is('videos*') ? 'active' : '' }}">Courses</a></li>
        <li><a href="{{ route('teacher.display') }}" class="{{ Request::is('teachers') ? 'active' : '' }}">Teachers</a>
        </li>
        <li><a href="{{ route('events.index') }}" class="{{ Request::is('events') ? 'active' : '' }}">Events</a></li>
    </ul>
    @if (Route::has('login'))
        <nav id="myNav">
            @auth
                <div class="flex justify-between h-16">
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="profile-image inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div class="px-2">

                                        @if (Auth::user()->image)
                                            <img src="{{ asset(Auth::user()->image) }}" alt="Current Avatar"
                                                 class="CurrentMyimages">
                                        @else
                                            <img src="{{ asset('storage/images/profile.png') }}" alt="Default Avatar"
                                                class="img-thumbnail" style="max-width: 40px; border-radius:50%;">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="profile-name">{{ ucwords(explode(' ', Auth::user()->name)[0]) }}</div>
                                    </div>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link :href="route('profile.index', Auth::user())" class="btp">
                                    {{ __('My Profile') }}
                                </x-dropdown-link>
                                
                                <x-dropdown-link :href="route('profile.edit')" class="btp">
                                    {{ __('Settings') }}
                                </x-dropdown-link>
                                @if (Auth::user()->user_type === 'teacher')
                                    <x-dropdown-link :href="route('teacher.dashboard')" class="btp">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @elseif(Auth::user()->user_type === 'admin')
                                    <x-dropdown-link :href="route('components.statics')" class="btp">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @else
                                    <x-dropdown-link :href="route('dashboard')" class="btp">
                                        {{ __('Dashboard') }}
                                    </x-dropdown-link>
                                @endif


                                @if (Auth::user()->user_type === 'teacher')
                                    <x-dropdown-link :href="route('courses.create')" class="btp">
                                        {{ __('Create Course') }}
                                    </x-dropdown-link>
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" class="w2-full">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                          this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="btn-reg rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="btn-reg rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
    <div class="toggle-open"><i class="fa-solid fa-bars-staggered"></i></div>
    <div class="toggle-close"><i class="fa-solid fa-xmark"></i></div>
</div>

<script>
    var menu = document.querySelector("ul");
    var openbtn = document.querySelector(".toggle-open");
    var closebtn = document.querySelector(".toggle-close");

    openbtn.onclick = () => {
        menu.classList.add("active");
    };
    closebtn.onclick = () => {
        menu.classList.remove("active");
    };


    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth <= 992) {
            const nav = document.getElementById('myNav');
            const ul = document.getElementById('myList');
            const navItem = document.createElement('li');
            navItem.appendChild(nav);
            ul.appendChild(navItem);
        }
    });
</script>
