<x-app-layout>
    <div class="container">
        <div class="courses-area padding-section-2 fix">
            <h1>Courses</h1>
            <div class="global_search">
                <form action="{{ route('courses.index') }}" method="get">
                    <div class="absolute">
                        <input type="text" placeholder="Search..." name="search"
                            value="{{ isset($search) ? $search : '' }}">
                        <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="ag-format-container">
                    <div class="ag-courses_box" id="courses-container">
                        @foreach ($courses as $course)
                            <div class="ag-courses_item">
                                <a href="{{ route('courses.show', $course) }}" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>
                                    <div class="ag-courses-item_image">
                                        <img src="{{ $course->image }}" alt="">
                                    </div>
                                    <div class="pad">
                                        <div class="ag-courses-item_title">
                                            {{ Str::limit($course->title, 30) }}
                                        </div>
                                        <div class="ag-courses-item_subtext">
                                            {{ Str::limit($course->subtext, 55, '...') }}
                                        </div>
                                        <div class="ag-courses-item_date-box">
                                            Start:
                                            <span class="ag-courses-item_date">
                                                {{ $course->created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
