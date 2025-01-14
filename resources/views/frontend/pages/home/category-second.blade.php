<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Choose your desired courses</h5>
            <h2 class="section__title">The world's largest selection of courses</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        <ul class="nav nav-tabs generic-tab justify-content-center pb-4" id="myTab" role="tablist">

            @foreach ($categories as $index => $item)
                <li class="nav-item">
                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $item->slug }}-tab" data-toggle="tab"
                        href="#{{ $item->slug }}" role="tab" aria-controls="{{ $item->slug }}"
                        aria-selected="true">{{ $item->name }}</a>
                </li>
            @endforeach


        </ul>
    </div><!-- end container -->
    <div class="card-content-wrapper bg-gray pt-50px pb-120px">
        <div class="container">
            <div class="tab-content" id="myTabContent">

                @foreach ($course_category as $index => $data)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }} " id="{{ $data->slug }}"
                        role="tabpanel" aria-labelledby="{{ $data->slug }}-tab">
                        <div class="row">

                            @foreach ($data['course'] as $course)
                                <div class="col-lg-4 responsive-column-half">

                                    <div class="card card-item card-preview"
                                        data-tooltip-content="#{{ $course->course_name_slug }}">

                                        <div class="card-image">
                                            <a href="{{ route('course-details', $course->course_name_slug) }}" class="d-block">
                                                <img class="card-img-top lazy" width="240" height="240" src="{{ asset($course->course_image) }}"
                                                    data-src="{{ asset($course->course_image) }}" alt="Card image cap">
                                            </a>
                                            <div class="course-badge-labels">
                                                <div class="course-badge">
                                                    @if ($course->bestseller == 'yes')
                                                        Bestseller
                                                    @elseif($course->featured == 'yes')
                                                        Featured
                                                    @else
                                                        HighestRated
                                                    @endif
                                                </div>
                                                <div class="course-badge blue">
                                                    -{{ round((($course->selling_price - $course->discount_price) / $course->selling_price) * 100) }}%
                                                </div>
                                            </div>

                                        </div> <!-- end card-image -->

                                        <div class="card-body">
                                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3"
                                                style="text-transform:capitalize">{{ $course->label }}
                                            </h6>

                                            <h5 class="card-title">
                                                <a href="{{ route('course-details', $course->course_name_slug) }}">
                                                    {{ \Illuminate\Support\Str::limit($course->course_name, 50) }}
                                                </a>
                                            </h5>

                                            <p class="card-text">
                                                <a
                                                    href="{{ route('instructor', [$course['user']['name'], $course['user']['id']]) }}">
                                                    {{ $course['user']['name'] }}
                                                </a>
                                            </p>

                                            <div class="rating-wrap d-flex align-items-center py-2">
                                                <div class="review-stars">

                                                    @php

                                                        $count_ratings = \App\Models\Review::where('status', 1)
                                                            ->where('course_id', $course->id)
                                                            ->count();
                                                        $unique_student = \App\Models\Review::where('status', 1)
                                                            ->where('course_id', $course->id)
                                                            ->distinct()
                                                            ->pluck('user_id')
                                                            ->count();

                                                        $averageRating = \App\Models\Review::where(
                                                            'course_id',
                                                            $course->id,
                                                        )
                                                            ->where('status', 1)
                                                            ->avg('rating');

                                                    @endphp



                                                    <span
                                                        class="rating-number">{{ number_format($averageRating, 1) }}</span>

                                                    @php
                                                        $fullStars = floor($averageRating); // পূর্ণ তারকার সংখ্যা
                                                        $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0; // অর্ধেক তারকা (যদি থাকে)
                                                        $emptyStars = 5 - $fullStars - $halfStar; // খালি তারকার সংখ্যা
                                                    @endphp

                                                    {{-- পূর্ণ তারকা --}}
                                                    @for ($i = 0; $i < $fullStars; $i++)
                                                        <span class="la la-star"></span>
                                                    @endfor

                                                    {{-- অর্ধেক তারকা --}}
                                                    @if ($halfStar)
                                                        <span class="la la-star-half"></span>
                                                    @endif

                                                    {{-- খালি তারকা --}}
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <span class="la la-star-o"></span>
                                                    @endfor



                                                </div>
                                                <span class="rating-total pl-1">({{ $count_ratings }} ratings)</span>
                                                <span class="student-total pl-2">{{ $unique_student }} students</span>

                                            </div><!-- end rating-wrap -->

                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="card-price text-black font-weight-bold">
                                                    ${{ $course->discount_price }} <span
                                                        class="before-price font-weight-medium">{{ $course->selling_price }}</span>
                                                </p>

                                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer wishlist-icon"
                                                    title="Add to Wishlist" data-course-id="{{ $course->id }}">

                                                    <?php
                                                    // Check if the user is authenticated
                                                    if (auth()->check()) {
                                                        $user_id = auth()->user()->id;

                                                        // Check if the course is in the wishlist
                                                        $isWishlisted = \App\Models\Wishlist::where('user_id', $user_id)
                                                            ->where('course_id', $course->id)
                                                            ->first();
                                                    } else {
                                                        $isWishlisted = null; // Default value for non-authenticated users
                                                    }
                                                    ?>

                                                    @if ($isWishlisted)
                                                        <i class="la la-heart"></i>
                                                    @else
                                                        <i class="la la-heart-o"></i>
                                                    @endif



                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div><!-- end col-lg-4 -->
                            @endforeach

                        </div><!-- end row -->
                    </div><!-- end tab-pane -->
                @endforeach

            </div><!-- end tab-content -->
            <div class="more-btn-box mt-4 text-center">
                <a href="{{ route('allCourse') }}" class="btn theme-btn">Browse all Courses <i
                        class="la la-arrow-right icon ml-1"></i></a>
            </div><!-- end more-btn-box -->
        </div><!-- end container -->
    </div><!-- end card-content-wrapper -->
</section>


<!-- end courses-area -->
