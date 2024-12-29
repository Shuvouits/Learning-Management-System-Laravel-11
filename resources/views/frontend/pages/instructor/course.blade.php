
<section class="course-area section-padding">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between pb-3">
            <h3 class="fs-24 font-weight-semi-bold">My courses</h3>
            <span class="ribbon ribbon-lg">24</span>
        </div>
        <div class="divider"><span></span></div>
        <div class="row pt-30px">



            @foreach($user_course as $course)

            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item card-preview" data-tooltip-content="#{{$course->course_name_slug}}">
                    <div class="card-image">
                        <a href="course-details.html" class="d-block">
                            <img class="card-img-top lazy" src="{{asset($course->course_image)}}"
                                data-src="{{asset($course->course_image)}}" alt="Card image cap">
                        </a>
                        <div class="course-badge-labels">
                            <div class="course-badge">
                                @if($course->bestseller == 'yes')
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
                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3" style="text-transform:capitalize">{{$course->label}}</h6>
                        <h5 class="card-title"><a href="{{route('course-details', $course->course_name_slug)}}">{{$course->course_name}}</a></h5>

                        <p class="card-text">
                            <a href="{{ route('instructor', [$course['user']['name'], $course['user']['id']]) }}">
                                {{ $course['user']['name'] }}
                            </a>
                        </p>


                        <div class="rating-wrap d-flex align-items-center py-2">
                            <div class="review-stars">
                                <span class="rating-number">4.4</span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                            </div>
                            <span class="rating-total pl-1">(20,230)</span>
                        </div><!-- end rating-wrap -->
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-price text-black font-weight-bold">${{$course->discount_price}} <span
                                    class="before-price font-weight-medium">{{$course->selling_price}}</span></p>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->


            @endforeach



        </div><!-- end row -->
        <div class="text-center pt-3">
            <nav aria-label="Page navigation example" class="pagination-box">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <p class="fs-14 pt-2">Showing 1-6 of 24 results</p>
        </div>
    </div><!-- end container -->
</section><!-- end courses-area -->
