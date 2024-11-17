    <x-app-layout>
        <div class="padding-section-1 Page_Teachers">
            <div class="container">
                <div class="flex-start01">
                    <div class="teachers-apx">
                        <div class="teachers-apx-flex">
                            @foreach ($teachers as $teacher)
                                <div class="card" id="card">
                                    <div class="background_image">
                                        <img src="{{ asset('storage/myapp/' . $teacher->backgroundimage) }}"
                                            alt="">
                                    </div>
                                    <div class="image">
                                        <img src="{{ $teacher->image }}" alt="Image_Teacher">
                                    </div>
                                    <div class="card-info">
                                        <span>{{ $teacher->name }}</span>
                                        <p>Support Specialist</p>
                                    </div>
                                    <a class="button" href="{{route('action')}}">Folow</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="followers-section">
                        <h2>Follow Teachers</h2>
                        @foreach ($teachers as $teacher)
                            <ul>
                                <li>
                                    <div class="follower-items">
                                        <a href="{{ route('profile.index', ['user' => $teacher->id]) }}"
                                            class="follower-item">
                                            <div class="follower-avatar"><img src="{{ $teacher->image }}"
                                                    alt="">
                                            </div>
                                            <div class="follower-info">
                                                <h3>{{ $teacher->name }}</h3>
                                                <p>{{ '@' . $teacher->name }}</p>
                                            </div>
                                        </a>
                                        <a href="{{route('action')}}" class="follow-button">Follow</a>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    {{-- <script>
        const boxes = document.querySelectorAll('.card');

        boxes.forEach(box => {
            let isCircle = false;

            box.addEventListener('mouseenter', () => {
                isCircle = !isCircle;
                if (isCircle) {
                    box.style.borderRadius = '50%';
                } else {
                    box.style.borderRadius = '15px';
                }
            });
        });
    </script> --}}
