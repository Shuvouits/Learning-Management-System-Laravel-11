@extends('frontend.master')


@section('content')

<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">Blog List</h2>
            </div>
            <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="/">Home</a></li>
                <li>Blogs</li>
                <li>Blog List</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section>


<section class="course-area section-padding">
    <div class="container">
        <div class="filter-bar mb-4">
            <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                <p class="fs-14">We found <span class="text-black">{{$blog_data['blogpost']->count()}}</span> courses available for you</p>

            </div><!-- end filter-bar-inner -->

        </div><!-- end filter-bar -->
        <div class="row">

            @foreach($blog_posts as $item)

            <div class="col-lg-12">
                <div class="card card-item card-preview card-item-list-layout tooltipstered" data-tooltip-content="#tooltip_content_1">
                    <div class="card-image">
                        <a href="{{route('blogDetails', $item->post_slug)}}" class="d-block">
                            <img class="card-img-top lazy" src="{{asset($item->post_image)}}" alt="Card image cap" style="">
                        </a>

                    </div><!-- end card-image -->
                    <div class="card-body">

                        <h5 class="card-title"><a href="{{route('blogDetails', $item->post_slug)}}">{{$item->post_title}}</a></h5>
                        <p class="card-text badge bg-primary px-3 py-2"><a href="teacher-detail.html" style="color: white">Jose Portilla</a></p>

                        <div style="margin-top: 10px">
                            <p>
                                {!! Str::limit(strip_tags($item->long_descp), 300, '...') !!}

                            </p>

                        </div>



                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-12 -->

            @endforeach


        </div><!-- end row -->


        @include('frontend.pages.blog.category.paginate')



    </div><!-- end container -->
</section>

@endsection
