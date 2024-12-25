<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Aduca - Education HTML Template</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">

     @include('backend.user.section.link')

    <!-- end inject -->
</head>

<body>

    <!-- start cssload-loader -->
    <div class="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->

    @include('backend.user.section.header')



    <section class="dashboard-area">
        <div class="off-canvas-menu dashboard-off-canvas-menu off--canvas-menu custom-scrollbar-styled pt-20px">
            <div class="off-canvas-menu-close dashboard-menu-close icon-element icon-element-sm shadow-sm"
                data-toggle="tooltip" data-placement="left" title="Close menu">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
            <div class="logo-box px-4">
                <a href="index.html" class="logo"><img src="{{ asset('frontend/images/logo.png') }}"
                        alt="logo"></a>
            </div>

            @include('backend.user.section.sidebar')

        </div><!-- end off-canvas-menu -->
        <div class="dashboard-content-wrap">
            <div class="dashboard-menu-toggler btn theme-btn theme-btn-sm lh-28 theme-btn-transparent mb-4 ml-3">
                <i class="la la-bars mr-1"></i> Dashboard Nav
            </div>

            <div class="container-fluid">

                <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
                    <div class="media media-card align-items-center">
                        <div class="media-img media--img media-img-md rounded-full">
                            <img class="rounded-full" src="{{asset('frontend/images/small-avatar-1.jpg')}}" alt="Student thumbnail image">
                        </div>
                        <div class="media-body">
                            <h2 class="section__title fs-30">Howdy, Tim Buchalka</h2>
                            <div class="rating-wrap d-flex align-items-center pt-2">
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
                        </div><!-- end media-body -->
                    </div><!-- end media -->
                    <div class="file-upload-wrap file-upload-wrap-2 file--upload-wrap">
                        <input type="file" name="files[]" class="multi file-upload-input">
                        <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload a course</span>
                    </div><!-- file-upload-wrap -->
                </div><!-- end breadcrumb-content -->
                <div class="section-block mb-5"></div>

                @yield('content')

                <div class="row align-items-center dashboard-copyright-content pb-4">
                    <div class="col-lg-6">
                        <p class="copy-desc">&copy; 2021 Aduca. All Rights Reserved. by <a href="https://techydevs.com/">TechyDevs</a>
                        </p>
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14 justify-content-end">
                            <li class="mr-3"><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->


            </div>




        </div><!-- end dashboard-content-wrap -->
    </section><!-- end dashboard-area -->


    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->



    @include('backend.user.section.modal')

    @include('backend.user.section.script')


</body>

</html>
