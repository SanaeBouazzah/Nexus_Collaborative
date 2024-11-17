<x-app-layout>
    <div class="flex-videos">
        <div class="divone-videos">
          jhhhhhhhhhhhh
            <div>
                <div class="video-title">
                    <h1>{{ $video->title }}</h1>
                </div>
                <div class="show-video">
                    <video controls>
                        <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="video-tab">
                    <div class="tab-buttons">
                        <button class="tablinks active" onclick="openTab(event, 'tab1')">Description</button>
                        <button class="tablinks" onclick="openTab(event, 'tab2')">Notes</button>
                        <button class="tablinks" onclick="openTab(event, 'tab3')">Announcements</button>
                        <button class="tablinks" onclick="openTab(event, 'tab4')">Teacher</button>
                    </div>
                    <div id="tab1" class="tab active video-description">
                        <h2>What Will you learn : </h2>
                        <p>{{ $video->description }}</p>
                    </div>
                    <div id="tab2" class="tab video-description">
                        {{-- <h2>Description : </h2> --}}
                        <p>{{ $video->notes }}</p>
                    </div>
                    <div id="tab3" class="tab video-description">
                        {{-- <h2>Description : </h2> --}}
                        <p>{{ $video->announcements }}</p>
                    </div>
                    <div id="tab4" class="tab video-description">
                        <div class="flex" style="width: 200px; margin-top:20px;">
                            <img src="{{ asset($video->user->image) }}" alt="" width="50px" height="50px">
                            <p>{{ $video->user->name }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="divtwo-videos">
            @foreach ($videos as $video)
                <ul>
                    <li>
                        <a class="div-flex" href="{{ route('videos.show', $video) }}">
                            <span>{{ $video->title }}</span>
                        </a>
                    </li>
                </ul>
            @endforeach
        </div> --}}
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
