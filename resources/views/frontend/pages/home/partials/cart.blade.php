<ul>
    <li>
        <p class="shop-cart-btn d-flex align-items-center">
            <i class="la la-shopping-cart"></i>
            <span class="product-count">{{ count($cart) }}</span>
        </p>
        <ul class="cart-dropdown-menu">
            @foreach($cart as $item)
                <li class="media media-card">
                    <a href="course-details.html" class="media-img">
                        <img src="{{ $item->course->course_image }}" alt="{{ $item->course->course_title }}">
                    </a>
                    <div class="media-body">
                        <h5>
                            <a href="course-details.html">{{ $item->course->course_title }}</a>
                        </h5>
                        <span class="d-block lh-18 py-1">{{ $item->course->user->name }}</span>
                        <p class="text-black font-weight-semi-bold lh-18">
                            ${{ number_format($item->course->discount_price, 2) }}
                            @if($item->course->selling_price > $item->course->discount_price)
                                <span class="before-price fs-14">${{ number_format($item->course->selling_price, 2) }}</span>
                            @endif
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </li>
</ul>

