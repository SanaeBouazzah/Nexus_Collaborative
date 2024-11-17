<x-app-layout>
    <div class="container">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-4">
            @if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin')
                <div class="trigger">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger" class="dots">
                            <button
                                class="profile-image inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div class="px-2">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @if (Auth::guest())
                                <script>
                                    window.location.href = "{{ route('register') }}";
                                </script>
                            @else
                                @if (auth()->user()->user_type === 'teacher' || auth()->user()->user_type === 'admin')
                                    <x-dropdown-link :href="route('courses.edit', $course->id)">
                                        {{ __('Edit A Course') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('videos.create')">
                                        {{ __('Add a Section') }}
                                    </x-dropdown-link>
                                    <form action="{{ route('courses.destroy', $course) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-dropdown-link :href="route('courses.destroy', $course)">
                                            {{ __('Delete A Course') }}
                                        </x-dropdown-link>
                                    </form>
                                @endif
                            @endif
                        </x-slot>
                    </x-dropdown>
                </div>
            @endif
            <div class="properties__card">
                <div class="properties__img overlay1">
                    <a href="#"><img src="{{ asset('assets/img/gallery/featured1.png') }}" alt=""></a>
                </div>
                <div class="properties_flex">
                    <div class="properties__caption">
                        <div class="as-courses_item">
                            <div class="ag-courses-item_image">
                                <img src="{{ $course->image }}" alt="">
                            </div>
                            <div class="pad">
                                <div class="as-courses-item_title">
                                    {{ $course->title }}
                                </div>
                                <div class="as-courses-item_subtext">
                                    {{ $course->subtext }}
                                </div>
                                <div class="as-courses-item_hours">
                                    Hours : {{ $course->hours }}H
                                </div>
                                <div class="as-courses-item_date-box">
                                    Start :
                                    <span class="ag-courses-item_date">
                                        {{ $course->created_at }}
                                    </span>
                                </div>
                                <a class="as-courses-item_teacher" href="{{ route('profile.index', $course->user) }}">
                                    <div class="image">
                                        <img src="{{ asset($course->user->image) }}" alt="">
                                    </div>
                                    <div class="name-teacher"><b>By Teacher : </b> {{ $course->user->name }}</div>
                                </a>
                                <div class="as-courses-item_button">
                                    @if ($videos->isNotEmpty())
                                        <a href="{{ route('courses.appear', ['course' => $course->id, 'video' => $videos->first()->id]) }}"
                                            class="btn btn-primary">
                                            Enroll Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="description">
                            <h1>Description :</h1>
                            <h2>What Will you learn :</h2>
                            <p>{{ $course->description }}</p>
                        </div>
                    </div>
                    <div class="comments">
                        <livewire:comments :model="$course" />
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
