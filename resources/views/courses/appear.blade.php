<x-app-layout>
    <div class="container">
        <div class="flex-videos">
            <div class="divone-videos">
                <div>
                    <div class="video-title">
                        <h1><span id="order">{{ $video->order }}</span>- {{ $video->title }}</h1>
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
                            <h2>What Will You Learn : </h2>
                            <p>{{ $video->description }}</p>
                        </div>
                        <div id="tab2" class="tab video-description">
                            <p>{{ $video->notes }}</p>
                        </div>
                        <div id="tab3" class="tab video-description">
                            <p>{{ $video->announcements }}</p>
                        </div>
                        <div id="tab4" class="tab video-description">
                            <a class="flex" style="width: 200px; margin-top:20px;"
                                href="{{ route('profile.index', $video->user) }}">
                                <img src="{{ asset($video->user->image) }}" alt="" width="50px"
                                    height="50px">
                                <div>{{ $video->user->name }}</div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="divtwo-videos">
                <ul>
                    @foreach ($videos as $video)
                        <li>
                            <a class="video-link"
                                href="{{ route('courses.appear', ['course' => $course->id, 'video' => $video->id]) }}">
                                <span id="order2">{{ $video->order }}</span>&nbsp;
                                <span>{{ Str::limit($video->title, 45, '...') }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tab");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }

    document.addEventListener('DOMContentLoaded', function() {
    const videoLinks = document.querySelectorAll('.video-link');
    const specificVideoOrderElement = document.getElementById('order');
    const specificVideoOrder = specificVideoOrderElement.textContent.trim();

    videoLinks.forEach(function(link) {
        const videoOrderElement = link.querySelector('#order2');
        const videoOrder = videoOrderElement.textContent.trim();

        if (videoOrder === specificVideoOrder) {
            link.classList.add('same-order-class');
        }
    });
    });
</script>
