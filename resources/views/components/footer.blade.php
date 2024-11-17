<div class="footer">
    <div class="container">
        <div class="footer_flex">
            <div class="div">
                <div class="logo">
                    <div class="image">
                        <a href="{{ route('home') }}">
                            <h1>Nexus <b class="b-green">Collaborative</b></h1>
                        </a>
                    </div>
                </div>
                <div class="quote">
                    <p>Learning is the only thing the mind never exhausts, never fears, and never regrets.</p>
                </div>
                <div class="social-media">
                    <h4>Connect with us on other platforms :</h4>
                    <a href="{{route('action')}}"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{route('action')}}"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{route('action')}}"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="list">
                <h3>Our Links</h3>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('courses.index') }}"
                            class="{{ Request::is('courses*') || Request::is('videos*') ? 'active' : '' }}">Courses</a>
                    </li>
                    <li><a href="{{ route('teacher.display') }}"
                            class="{{ Request::is('teachers') ? 'active' : '' }}">Teachers</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Events</a></li>
                </ul>
            </div>
            <div class="list">
                <h3>Resources</h3>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Jobs</a></li>
                    <li><a href="{{ route('courses.index') }}"
                            class="{{ Request::is('courses*') || Request::is('videos*') ? 'active' : '' }}">Developers</a>
                    </li>
                    <li><a href="{{ route('teacher.display') }}"
                            class="{{ Request::is('teachers') ? 'active' : '' }}">Contact us</a></li>
                    <li><a href="" class="{{ Request::is('events') ? 'active' : '' }}">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="partner">
                <h1>Become a Partner</h1>
                <a href="{{route('action')}}"><i class="fa-solid fa-hand-point-up"></i> One Click</a>
                <a href="{{route('action')}}">Get Ticket</a>
            </div>
        </div>
        <hr>
        <p class="parafooter">All Rights Reserved To creator Sanae Bouazzah &copy; {{ date('Y') }}</p>
    </div>
</div>
