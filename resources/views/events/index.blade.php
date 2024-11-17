<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Nexus Collaborative') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/myapp/graduate.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-Cl4Ts70A.css') }}">
    <script src="{{ asset('build/assets/app-Cs0QkU1O.js') }}"></script>
</head>

<body>
    <header class="header">
        <div class="navigation_navbar">
            <div class="container">
                @include('components.navbar')
            </div>
        </div>
    </header>
    <div class="introduction">
        <video plays-inline class="clip" autoplay poster="{{asset('storage/myapp/friends-study.jpeg')}}">
            <source src="{{ asset('storage/myapp/introduction.mp4') }}" type="video/mp4">
            <source src="path/to/your-video.ogg" type="video/ogg">
            <track src="subtitles.vtt" kind="subtitles" srclang="en" label="English">
            Your browser does not support the video tag.
        </video>
        <div class="container">
          <div class="nexus-collaborative">
            <div class="nexus-collaborative-p">
                <h1>Nexus <br/>Collaborative</b></h1>
                <a href="{{route('action')}}">Get Ticket</a>
            </div>
        </div>
        </div>
    </div>
    <div class="gallery_events">
        <div class="container">
            <h1 class="heading-h1">Join Us</h1>
            <div class="gallery_flex">
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic1.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic2.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic3.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic4.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic5.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic6.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic7.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic8.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic9.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic10.jpeg') }}" alt="">
                </div>
                <div class="image">
                    <img src="{{ asset('storage/myapp/pic11.jpeg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="events">
        <div class="container">
            <h1 class="heading-h1">Events</h1>
            <p class="heading-p">Nexus is the premier destination for collaborative learning that transcends traditional
                boundaries.
            </p>
            <div class="events-flex">
                <div class="even">
                    <div class="image">
                        <img src="{{ asset('storage/myapp/event1.jpg') }}" alt="">
                    </div>
                    <h2>Event Rabat</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit nostrums seq</p>
                    <div class="not">
                        <div class="flex">
                          <strong>Ratings : (4.7)</strong>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('action')}}">More</a>
                </div>
                <div class="even">
                    <div class="image">
                        <img src="{{ asset('storage/myapp/event2.jpg') }}" alt="">
                    </div>
                    <h2>Event Tanger</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit nostrums seq</p>
                    <div class="not">
                        <div class="flex">
                          <strong>Ratings : (4.7)</strong>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('action')}}">More</a>
                </div>
                <div class="even">
                    <div class="image">
                        <img src="{{ asset('storage/myapp/charming-students.jpg') }}" alt="">
                    </div>
                    <h2>Event Casa</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit nostrums seq</p>
                    <div class="not">
                        <div class="flex">
                          <strong>Ratings : (4.7)</strong>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('action')}}">More</a>
                </div>
                <div class="even">
                    <div class="image">
                        <img src="{{ asset('storage/myapp/event3.jpg') }}" alt="">
                    </div>
                    <h2>Event Fes</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit nostrums seq</p>
                    <div class="not">
                        <div class="flex">
                          <strong>Ratings : (4.7)</strong>
                            <div>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('action')}}">More</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="">
        @include('components.footer')
    </footer>
</body>

</html>
