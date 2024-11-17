<x-app-layout>
  <div class="courses-area section-padding40 fix">
      <div class="container">
          <div class="row">
              <div class="ag-format-container">
                  <div class="ag-courses_box" id="courses-container">
                      @foreach ($courses as $course)
                          <div class="ag-courses_item">
                              <a href="{{ route('courses.show', $course) }}" class="ag-courses-item_link">
                                  <div class="ag-courses-item_bg"></div>
                                  <div class="ag-courses-item_image">
                                      <img src="{{ $course->image }}" alt="">
                                  </div>
                                  <div class="pad">
                                      <div class="ag-courses-item_title">
                                          {{ $course->title }}
                                      </div>
                                      <div class="ag-courses-item_subtext">
                                          {{ $course->subtext }}
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
          </div>
      </div>
  </div>
</x-app-layout>