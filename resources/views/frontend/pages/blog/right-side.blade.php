<div class="col-lg-4">
    <div class="sidebar">

        <div class="card card-item">
            <div class="card-body">
                <h3 class="card-title fs-18 pb-2">Categories</h3>
                <div class="divider"><span></span></div>
                @foreach ($category as $item)
                    <div class="custom-control custom-checkbox mb-1 fs-15">
                        <input type="checkbox" class="custom-control-input" id="catCheckbox_{{ $item->id }}" required>
                        <label class="custom-control-label custom--control-label text-black"
                            for="catCheckbox_{{ $item->id }}">
                            <a href="{{ route('blogCategory', $item->category_slug) }}" class="text-black">
                                {{ $item->category_name }}
                            </a>
                            <span class="ml-1 text-gray">({{ $item->blogpost->count() }})</span>
                        </label>
                    </div>
                @endforeach



            </div>
        </div><!-- end card -->
        <div class="card card-item">
            <div class="card-body">
                <h3 class="card-title fs-18 pb-2">Archives</h3>
                <div class="divider"><span></span></div>
                <ul class="generic-list-item">

                    @php
                        $lastDate = null;
                    @endphp

                    @foreach ($category as $item)
                        @php
                            $currentDate = $item->created_at->format('F Y');
                        @endphp

                        @if ($currentDate !== $lastDate)
                            <li><a href="#">{{ $currentDate }}</a></li>
                            @php
                                $lastDate = $currentDate;
                            @endphp
                        @endif
                    @endforeach


                </ul>
            </div>
        </div><!-- end card -->
        <div class="card card-item">
            <div class="card-body">
                <h3 class="card-title fs-18 pb-2">Recent Posts</h3>
                <div class="divider"><span></span></div>

                @foreach ($all_blog as $data)
                    <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                        <a href="{{ route('blogDetails', $data->post_slug) }}" class="media-img">
                            <img class="mr-3" src="{{ asset($data->post_image) }}" alt="Related course image">
                        </a>
                        <div class="media-body">
                            <h5 class="fs-15"><a
                                    href="{{ route('blogDetails', $data->post_slug) }}">{{ $data->post_title }}</a></h5>
                            <span class="d-block lh-18 py-1 fs-14">Kamran Ahmed</span>

                        </div>
                    </div><!-- end media -->
                @endforeach

                <div class="view-all-course-btn-box">
                    <a href="blog-no-sidebar.html" class="btn theme-btn w-100">View All Posts <i
                            class="la la-arrow-right icon ml-1"></i></a>
                </div>
            </div>
        </div><!-- end card -->

        <div class="card card-item">
            <div class="card-body">
                <h3 class="card-title fs-18 pb-2">Post Tags</h3>
                <div class="divider"><span></span></div>
                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                    <li class="mr-2"><a href="#">Business</a></li>
                    <li class="mr-2"><a href="#">Event</a></li>
                    <li class="mr-2"><a href="#">Video</a></li>
                    <li class="mr-2"><a href="#">Audio</a></li>
                    <li class="mr-2"><a href="#">Software</a></li>
                    <li class="mr-2"><a href="#">Conference</a></li>
                    <li class="mr-2"><a href="#">Marketing</a></li>
                    <li class="mr-2"><a href="#">Freelance</a></li>
                    <li class="mr-2"><a href="#">Tips</a></li>
                    <li class="mr-2"><a href="#">Technology</a></li>
                    <li class="mr-2"><a href="#">Entrepreneur</a></li>
                </ul>
            </div>
        </div><!-- end card -->
        <div class="card card-item">
            <div class="card-body">
                <h3 class="card-title fs-18 pb-2">Subscribe</h3>
                <div class="divider"><span></span></div>
                <form method="post">
                    <div class="input-group">
                        <input class="form-control form--control pl-3" type="email" name="email"
                            placeholder="Enter email address">
                        <div class="input-group-append">
                            <button class="btn theme-btn"><i class="la la-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- end card -->

    </div><!-- end sidebar -->
</div><!-- end col-lg-4 -->
