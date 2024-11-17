<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nexus Collaborative</title>
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

        <div class="container">
            {{-- content --}}
            <div class="content">
                <div class="banner-image">
                    <div class="banner-image_flex">
                        <div class="social-media">
                            <a href="{{route('action')}}"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="{{route('action')}}"><i class="fa-brands fa-instagram"></i></a>
                            <a href="{{route('action')}}"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <div class="image">
                            <img src="{{ asset('storage/myapp/graduation.png') }}" alt="">
                        </div>
                        <div class="mark-one">
                            <i class="fa-solid fa-book"></i>
                            <p>210K+ Courses </p>
                        </div>
                    </div>
                    <div class="ext">
                        <div class="down">
                            <a href="#down"><i class="fa-solid fa-arrow-down"></i>Discover Our Features</a>
                        </div>
                    </div>
                </div>
                <div class="banner">
                    <h1>Elevate your learning through <b class="b-green">collaborative</b> discovery.</h1>
                    <p>Nexus is the premier destination for collaborative learning that transcends traditional
                        boundaries.
                        Here, diverse perspectives converge to ignite innovation and unlock new realms of knowledge.
                    </p>
                    <a href="#down" class="btn">Get Started</a>
                    <div class="courses">
                        <div class="swiper mySwiper home">
                            <div class="swiper-wrapper">
                                @foreach ($courses as $course)
                                    <div class="swiper-slide course-image">
                                        <a href="{{ route('courses.show', $course) }}">
                                            <img src="{{ asset($course->image) }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            {{-- <div class="swiper-pagination"></div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <section id="down" class="top_teachers padding-section-1">
        <div class="container">
            <h1 class="heading-h1">Top Teachers</h1>
            <p class="heading-p">The purpose of learning is growth, and our minds,
                unlike our bodies, can continue growing as we continue to live.</p>
            <div class="swiper mySwiper home2">
                <div class="swiper-wrapper">
                    @foreach ($users->where('user_type', 'teacher') as $user)
                        <div class="swiper-slide teacher-p">
                            <a href="{{ route('profile.index', $user) }}">
                                <div class="card">
                                    <div class="image">
                                        <img src="{{ asset($user->image) }}" alt="" width="100px"
                                            height="100px">
                                    </div>
                                    <span>{{ $user->name }}</span>
                                    <b>{{ Str::ucfirst($user->user_type) }}</b>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="top_courses padding-section-1">
        <div class="container">
            <h1 class="heading-h1">Top Courses</h1>
            <p class="heading-p">The purpose of learning is growth, and our minds,
                unlike our bodies, can continue growing as we continue to live.</p>
            <div class="flex nex-3">
                <div class="part">
                    <iframe src="https://www.youtube.com/embed/c9FcLbXOlhM?si=fdaHQZ7LiOvRnZpt"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="part-y">
                    <div class="div">
                        <div class="image">
                            <img src="{{ asset('storage/myapp/hat_graduation.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="div">
                        <div class="image">
                            <img src="{{ asset('storage/myapp/oldbook.png') }}" alt="">
                        </div>
                    </div>
                    <div class="div">
                        <div class="image">
                            {{-- <img src="{{ asset('storage/myapp/oldbook.png') }}" alt=""> --}}
                        </div>
                    </div>
                    <div class="div">
                        <div class="image">
                            <img src="{{ asset('storage/myapp/schoolgirl.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="circle">
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="benefits padding-section-1">
        <div class="container">
            <h1 class="heading-h1">Top Benefits</h1>
            <p class="heading-p">The purpose of learning is growth, and our minds,
                unlike our bodies, can continue growing as we continue to live.</p>
            <div class="bene-flex">
                <div class="px">
                    <div class="p-1">
                        <div class="image">
                            <img src="{{ asset('/storage/myapp/img1.jpg') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur .</p>
                        <div class="button">
                            <a href="{{route('action')}}">Discover More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="px">
                    <div class="p-1">
                        <div class="image">
                            <img src="{{ asset('/storage/myapp/img2.jpg') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur</p>
                        <div class="button">
                            <a href="{{route('action')}}">Discover More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="px">
                    <div class="p-1">
                        <div class="image">
                            <img src="{{ asset('/storage/myapp/img3.jpg') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur.</p>
                        <div class="button">
                            <a href="{{route('action')}}">Discover More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="px">
                    <div class="p-1">
                        <div class="image">
                            <img src="{{ asset('/storage/myapp/img4.jpg') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur</p>
                        <div class="button">
                            <a href="{{route('action')}}">Discover More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="services padding-section-1">
        <div class="container">
            <h1 class="heading-h1">Top Services</h1>
            <p class="heading-p">The purpose of learning is growth, and our minds,
                unlike our bodies, can continue growing as we continue to live.</p>
        </div>
        <div class="services-ext">
            <div class="container">
                <div class="flex services-content">
                    <div class="services-it">
                        <div>
                            <i class="fa-solid fa-computer"></i>
                            <strong>Web Development</strong>
                            <p>When you engage in web development, you're building a website</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-mobile"></i>
                            <strong>Mobile Development</strong>
                            <p>When you engage in web development, you're building a website</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-dice"></i>
                            <strong>Game Development</strong>
                            <p>When you engage in web development, you're building a website</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-computer"></i>
                            <strong>Business Analytics</strong>
                            <p>When you engage in web development, you're building a website</p>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
            <div class="services-svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#ffffff" fill-opacity="1" d="M0,0L40,32C80,64,160,128,240,160C320,192,400,192,480,186.7C560,181,640,171,720,192C800,
             213,880,267,960,272C1040,277,1120,235,1200,197.3C1280,160,1360,128,1400,112L1440,96L1440,
             320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,
             320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
                </svg>
            </div>
        </div>
    </section>
    <section class="testimonials-t padding-section-1">
        @include('components.testimonials')
    </section>
    <footer class="">
        @include('components.footer')
    </footer>


    {{-- <div class="top">
      <i class="fa-solid fa-arrow-up"></i>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".home", {
            slidesPerView: 3,
            spaceBetween: 5,
            grabCursor: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
        var swiper = new Swiper(".home2", {
            slidesPerView: 3,
            spaceBetween: 5,
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                992: {
                    slidesPerView: 2,
                },
                1190: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
</body>

</html>
