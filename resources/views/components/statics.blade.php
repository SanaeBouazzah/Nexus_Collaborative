<link rel="stylesheet" href="{{ asset('css/statics.css') }}">
@extends('admin.dashboard')

@section('s-contents')
    <div class="flex-tip">
        <div class="divone">
            <div class="statics">
                <div class="open_side-bar">
                    <div class="flex">
                        <button id="myButton"><i class="fa-solid fa-bars-staggered"></i></button>
                        <p>Hi, Welcome back 👋</p>
                    </div>
                </div>
                <h1>Today's Statics</h1>
                <span>Summary Statement</span>
                <div class="cards">
                    <div class="card card1"><i class="fa-solid fa-users"></i>Total Users: {{ $usersCount }}</div>
                    <div class="card card2"><i class="fa-solid fa-people-group"></i>Total Teachers: {{ $teachersCount }}
                    </div>
                    <div class="card card3"><i class="fa-solid fa-user-secret"></i>Total Admins: {{ $adminsCount }}
                    </div>
                    <div class="card card4"><i class="fa-solid fa-spinner"></i>Total Users in this Month:
                        {{ $currentMonthUsers }}
                    </div>
                    <div class="card card5"><i class="fa-solid fa-users-rays"></i>Total Visitors:
                        {{ $totalVisitors }}
                    </div>
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
    <div class="procourses">
      <div class="flex ex-flex">
          <div class="ex-tp">
              <h1>All Courses</h1>
              <span>Summary Statement</span>
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
      <div class="three">
          @foreach ($courses as $course)
              <div class="ag-courses_item">
                  <a href="{{ route('courses.show', $course) }}" class="ag-courses-item_link">
                      <div class="ag-courses-item_bg"></div>
                      <div class="ag-courses-item_image">
                          <img src="{{ $course->image }}" alt="">
                      </div>
                      <div class="pad">
                          <div class="ag-courses-item_title">
                              {{ Str::limit($course->title, 20) }}
                          </div>
                          <div class="ag-courses-item_subtext">
                              {{ Str::limit($course->subtext, 25, '...') }}
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
@endsection
