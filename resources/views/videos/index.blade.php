<x-app-layout>
    <div class="flex-videos">
        <div class="divone-videos">
          <div class="ag-format-container">
            <div class="ag-courses_box" id="courses-container">
                @foreach ($courses as $course)
                    <div class="ag-courses_item-1">
                        <a href="{{ route('courses.show', $course) }}" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>
                            <div class="ag-courses-item_image">
                                <img src="{{ $course->image }}" alt="">
                            </div>
                            <div class="pad">
                                <div class="ag-courses-item_title">
                                    {{ $course->title }}
                                </div>
                                <div class="ag-courses-item_subtext">
                                    {{ $course->subtext }}
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
        <div class="divtwo-videos">
            @foreach ($videos as $video)
                <ul>
                    <li>
                        <a class="div-flex" href="{{ route('videos.show', $video) }}">
                            <span>{{ $video->teacher }}</span>
                            <span>{{ $video->title }}</span>
                        </a>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        // Get all elements with class="tab" and hide them
        tabcontent = document.getElementsByClassName("tab");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the active class
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an active class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }
</script>
