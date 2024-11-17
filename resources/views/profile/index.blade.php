<link rel="stylesheet" href="{{ asset('css/profile-user.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="icon" type="image/x-icon" href="{{ asset('storage/myapp/graduate.png') }}">
<div class="flex">
    <div class="width-18">
        <div class="list">
            <div class="logo">
                <div class="image">
                    <a href="{{ route('home') }}">
                        <h1>Nexus <b class="b-green">Collaborative</b></h1>
                    </a>
                </div>
            </div>
            <div class="search">
                <input type="text" placeholder="Search">
            </div>

            <ul>
                @auth
                    <li><a href="{{ route('profile.index', auth()->user()->id) }}"
                            class="{{ Request::is('events') ? 'active' : '' }}">My Profile</a></li>
                @endauth
                <li><a href="{{ route('action') }}"
                        class="{{ Request::is('teachers') ? 'active' : '' }}">Payments/Transactions</a></li>
                <li><a href="{{ route('action') }}" class="{{ Request::is('teachers') ? 'active' : '' }}">Community
                        Involvement</a></li>
                <li><a href="{{ route('action') }}" class="{{ Request::is('events') ? 'active' : '' }}">Followers</a>
                </li>
                <li><a href="{{ route('action') }}"
                        class="{{ Request::is('events') ? 'active' : '' }}">Enrollements</a></li>
                <li><a href="{{ route('action') }}" class="{{ Request::is('events') ? 'active' : '' }}">Favorites</a>
                </li>
                <li><a href="{{ route('action') }}"
                        class="{{ Request::is('events') ? 'active' : '' }}">Support/Help</a></li>
                <li><a href="{{ route('profile.edit') }}"
                        class="{{ Request::is('profile') ? 'active' : '' }}">Settings</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="profile-information">
        <div class="backgroundImage">
            @if (Auth::check())
                @if (Auth::user()->id == $user->id)
                    <form id="backgroundImageForm" action="{{ route('profile.updateBackground', $user->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="background">
                                <img src="{{ asset('storage/myapp/' . $user->backgroundimage) }}" alt=""
                                    width="100%" height="300px" style="object-fit: cover" id="backgroundImagePreview">
                                <input type="file" class="form-control-file" id="backgroundimage-input"
                                    name="backgroundimage" style="display: none;" onchange="updateImagePreview(event)">
                            </div>
                        </div>
                        <button type="button" class="selectImageButton" id="selectImageButton">Select Background
                            Image</button>
                    </form>
                @else
                    <div class="background">
                        <img src="{{ asset('storage/myapp/' . $user->backgroundimage) }}" alt="">
                    </div>
                @endif
            @else
                <div class="background">
                    <img src="{{ asset('storage/myapp/' . $user->backgroundimage) }}" alt="">
                </div>
            @endif
        </div>
        <div class="container">
            <div class="info-user">
                <div class="image-profile">
                    <img src="{{ asset($user->image) }}" alt="">
                </div>
                <div class="info">
                    <h3>{{ $user->name }}</h3>
                    <span class="role">{{ $user->user_type }}</span>
                    <p style="margin: 0;" class="bio">{{ $user->bio }}</p>
                    <p class="join"><span>Joined On</span> {{ $user->created_at->format('Y - m - d') }} <br />
                        {{ $user->created_at->diffForHumans() }}</p>
                    </p>
                </div>
                <div class="object">
                    <p class="description">I am experienced in leveraging agile frameworks to provide a
                        robust synopsis for high level overviews. Iterative
                        approaches to corporate strategy foster collaborative
                        thinking to further the overall value proposition.</p>
                    <div class="social-media">
                        <a href=""><i class="fa-brands fa-facebook-f"></i> facebook</a>
                        <a href=""><i class="fa-brands fa-instagram"></i> Instagram</a>
                        <a href=""><i class="fa-brands fa-linkedin"></i> linkedin</a>
                        <a href=""><i class="fa-brands fa-github"></i> Github</a>
                    </div>
                    <div class="graduationprofile">
                        {{-- <img src="{{asset('storage/myapp/graduationprofile.png')}}" alt=""> --}}
                    </div>
                </div>
                <div class="experiences">
                    <h1>Experiences</h1>
                    <div class="flex">
                        <div class="experience">
                            <span class="date">
                                Apr 2017 - Mar 2018
                            </span>
                            <div class="position">
                                Google Analytics Certified Developer
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Maiores provident error hic blanditiis quasi? Placeat reiciendis odio recusandae iste
                                pariatur.
                            </div>
                        </div>
                        <div class="experience">
                            <span class="date">
                                Apr 2017 - Mar 2018
                            </span>
                            <div class="position">
                                Google Analytics Certified Developer
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Maiores provident error hic blanditiis quasi? Placeat reiciendis odio recusandae iste
                                pariatur.
                            </div>
                        </div>
                        <div class="experience">
                            <span class="date">
                                Apr 2017 - Mar 2018
                            </span>
                            <div class="position">
                                Google Analytics Certified Developer
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Maiores provident error hic blanditiis quasi? Placeat reiciendis odio recusandae iste
                                pariatur.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="galerie">
                    <h1>My Galerie</h1>
                    <div class="gallery">
                        @if ($images->isEmpty())
                            <p>No images found in this gallery.</p>
                        @else
                            <ul>
                                @foreach ($images as $image)
                                    <li class="image">
                                        <img src="{{ asset('storage/' . $image->image) }}" alt="Gallery Image"
                                            style="max-width: 200px;">
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="skills"></div>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('selectImageButton').addEventListener('click', function() {
        document.getElementById('backgroundimage-input').click();
    });

    function updateImagePreview(event) {
        const input = event.target;
        const preview = document.getElementById('backgroundImagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                // Automatically submit the form after updating the preview
                document.getElementById('backgroundImageForm').submit();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
