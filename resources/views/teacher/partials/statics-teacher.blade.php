<link rel="stylesheet" href="{{ asset('css/statics.css') }}">

<div class="flex-tip">
    <div class="divone">
        <div class="statics">
            <h1>Today's Statics</h1>
            <span>Summary Statement</span>
            <div class="flex cards">
                <div class="card card1"><i class="fa-solid fa-users"></i>Total Views: {{ $usersCount }}</div>
                <div class="card card2"><i class="fa-solid fa-people-group"></i>Total Teachers: {{ $teachersCount }}
                </div>
                <div class="card card3"><i class="fa-solid fa-user-secret"></i>Total Admins: {{ $adminsCount }}
                </div>
                <div class="card card4"><i class="fa-solid fa-spinner"></i>Total Users this Month:
                    {{ $currentMonthUsers }}
                </div>
                <div class="card card5"><i class="fa-solid fa-spinner"></i>Total Users this Year:
                    {{ $currentMonthUsers }}
                </div>
            </div>
        </div>
        <div class="procourses">
            <div class="flex">
                <div class="ex-tp">
                    <h1>All Courses</h1>
                    <span>My Courses</span>
                </div>
                <div class="global_search">
                  <form action="{{ route('components.statics') }}" method="get">
                      <div class="absolute">
                          <input type="text" placeholder="Search..." name="search"
                              value="{{ isset($search) ? $search : '' }}">
                          <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                      </div>
                  </form>
              </div>
            </div>
            <div class="flex gap three">
                @foreach ($courses as $course)
                    <div class="course-card">
                        <div class="image"><img src="{{ asset($course->image) }}" alt=""></div>
                        <div class="part2">
                            <a
                                href="{{ route('courses.show', $course) }}">{{ Str::limit($course->title, 40, '...') }}</a>
                            <p>{{ Str::limit($course->subtext, 20, '...') }}</p>
                            <p>Price : {{ $course->price }}$</p>

                            <div class="flex gap">
                                {{ $course->user->name }}
                                <img src="{{ asset($course->user->image) }}" alt="" width="30px"
                                    height="30px">
                            </div>
                            {{ date('l, F j, Y', strtotime($course->created_at)) }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="statics-teachers">
        <h1>Teachers</h1>
        <span>Connect with your teachers</span>
        <ul>
            @foreach ($teachers as $teacher)
                <li>
                    <div class="flex tech gap">
                        <a href="{{ route('profile.index', ['user' => $teacher->id]) }}" class="follower-item gap">
                            <div class="follower-avatar"><img src="{{ asset($teacher->image) }}" alt=""></div>
                            <div class="follower-info">
                                <h3>{{ $teacher->name }}</h3>
                                <p>{{ '@' . $teacher->name }}</p>
                            </div>
                        </a>
                        <button class="follow-button">Follow</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
