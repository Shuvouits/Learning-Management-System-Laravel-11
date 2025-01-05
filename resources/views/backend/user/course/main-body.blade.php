<div class="card-body">
    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3" style="text-transform:capitalize">
        {{ $item->course->label }}
    </h6>

    <h5 class="card-title"><a
            href="{{ route('user.course.show', $item->course->course_name_slug) }}">{{ $item->course->course_name }}</a>
    </h5>


    <p class="card-text">
        <a href="{{ route('instructor', [$item->course['user']['name'], $item->course['user']['id']]) }}">
            {{ $item->course['user']['name'] }}
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
    <ul class="card-duration d-flex align-items-center fs-15 pb-2">
        <li class="mr-2">
            <span class="text-black">Status:</span>
            @if ($item->course->status == 1)
                <span class="badge badge-success text-white">Published</span>
            @else
                <span class="badge badge-danger text-white">UnPublished</span>
            @endif
        </li>
        <li class="mr-2">
            <span class="text-black">Duration:</span>
            <span>3 hours 20 min</span>
        </li>
        <li class="mr-2">
            <span class="text-black">Students:</span>
            <span>30,405</span>
        </li>
    </ul>
    <div class="d-flex justify-content-between align-items-center">
        <p class="card-price text-black font-weight-bold">${{ $item->price }}</p>
        <div class="card-action-wrap pl-3">
            <a href="course-details.html"
                class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success"
                data-toggle="tooltip" data-placement="top" data-title="View"><i class="la la-eye"></i></a>
            <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary"
                data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="la la-edit"></i>
            </div>
            <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger"
                data-toggle="tooltip" data-placement="top" title="Delete">
                <span data-toggle="modal" data-target="#itemDeleteModal"
                    class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
            </div>
        </div>
    </div>
</div><!-- end card-body -->
