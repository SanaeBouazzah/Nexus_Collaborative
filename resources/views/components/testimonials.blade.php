{{-- <x-app-layout> --}}
<div class="container">
    <div class="testimonials">
        <h1 class="heading-h1">Testimonials</h1>
        <div class="testimonials-flex">
            <div class="swiper mySwiper testi">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-flex">
                            <div class="image">
                                <img src="{{ asset('storage/images/1722108222.png') }}" alt="">
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae beatae,
                                    asperiores, eligendi delectus nam corrupti placeat modi quidem sequi odit cupiditate
                                    ex minus asperiores, eligendi delectus nam corrupti placeat modi quidem sequi odit
                                    cupiditate
                                    ex minus eligendi delectus nam corrupti placeat modi quidem sequi odit cupiditate
                                    ex minus</p>
                                <span>By - Mina Merla</span>
                                <i class="fa-solid fa-quote-left"></i>
                                <p class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-flex">
                            <div class="image">
                                <img src="{{ asset('storage/images/1722108222.png') }}" alt="">
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae beatae,
                                    asperiores, eligendi delectus nam corrupti placeat modi quidem sequi odit cupiditate
                                    ex minus asperiores, eligendi delectus nam corrupti placeat modi quidem sequi odit
                                    cupiditate
                                    ex minus eligendi delectus nam corrupti placeat modi quidem sequi odit cupiditate
                                    ex minus</p>
                                <span>By - Mina Merla</span>
                                <i class="fa-solid fa-quote-left"></i>
                                <p class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-flex">
                            <div class="image">
                                <img src="{{ asset('storage/images/1722108222.png') }}" alt="">
                            </div>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae beatae,
                                    asperiores, eligendi delectus nam corrupti placeat modi quidem sequi odit cupiditate
                                    ex minus asperiores, eligendi delectus nam corrupti placeat modi quidem sequi odit
                                    cupiditate
                                    ex minus eligendi delectus nam corrupti placeat modi quidem sequi odit cupiditate
                                    ex minus</p>
                                <span>By - Mina Merla</span>
                                <i class="fa-solid fa-quote-left"></i>
                                <p class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next testi-button"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="swiper-button-prev testi-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
            </div>
            <div class="pictures-teachers">
                @foreach ($users->where('user_type', 'teacher')->take(3) as $user)
                    <div class="image">
                        <img src="{{ asset($user->image) }}" alt="" width="50" height="50">
                    </div>
                @endforeach
                <div class="circle-green"></div>
            </div>
        </div>
    </div>
</div>
{{-- </x-app-layout> --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".testi", {
        slidesPerView: 2,
        spaceBetween: 40,
        grabCursor: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 1,
            },
            1190: {
                slidesPerView: 2,
            },
        },
        navigation: {
            nextEl: ".testi-button",
            prevEl: ".testi-button-prev",
        },
    });
</script>
