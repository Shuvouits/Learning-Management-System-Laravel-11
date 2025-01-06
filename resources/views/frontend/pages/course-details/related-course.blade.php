<section class="related-course-area bg-gray pt-60px pb-60px">
    <div class="container">
        <div class="related-course-wrap">
            <h3 class="fs-28 font-weight-semi-bold pb-35px">More Courses by <a href="teacher-detail.html"
                    class="text-color hover-underline">{{ $course->user->name }}</a></h3>
            <div class="view-more-carousel-2 owl-action-styled">

                @foreach ($more_course_instructor as $course)
                    <div class="card card-item">
                        <div class="card-image">
                            <a href="course-details.html" class="d-block">
                                <img class="card-img-top lazy" src="{{ asset($course->course_image) }}"
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
                        </div><!-- end card-image -->
                        <div class="card-body">

                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3" style="text-transform:capitalize">
                                {{ $course->label }}
                            </h6>

                            <h5 class="card-title"><a
                                    href="{{ route('course-details', $course->course_name_slug) }}">{{ $course->course_name }}</a>
                            </h5>


                            <p class="card-text">
                                <a href="{{ route('instructor', [$course['user']['name'], $course['user']['id']]) }}">
                                    {{ $course['user']['name'] }}
                                </a>
                            </p>

                            <div class="rating-wrap d-flex align-items-center py-2">
                                <div class="review-stars">

                                    @php

                                        $rating_data = \App\Models\Review::where('course_id', $course->id)->first();
                                        $rating = $rating_data ? $rating_data->rating : 0;

                                        $all_rating_data = \App\Models\Review::where('course_id', $course->id)->get();

                                        $courseRatingCount = $all_rating_data->groupBy('rating')->map->count();

                                    @endphp


                                    <span class="rating-number">{{ $rating }}</span>
                                    @php
                                        $fullStars = floor($rating); // পূর্ণ তারকার সংখ্যা

                                        $emptyStars = 5 - $fullStars; // খালি তারকার সংখ্যা
                                    @endphp

                                    {{-- পূর্ণ তারকা --}}
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <span class="la la-star"></span>
                                    @endfor

                                   

                                    {{-- খালি তারকা --}}
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <span class="la la-star-o"></span>
                                    @endfor

                                </div>
                                <span class="rating-total pl-1">({{ $courseRatingCount->count() }})</span>
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

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                @endforeach

            </div><!-- end view-more-carousel -->
        </div><!-- end related-course-wrap -->
    </div><!-- end container -->
</section><!-- end related-course-area -->