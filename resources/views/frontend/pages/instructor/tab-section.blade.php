

<div class="bg-gray py-5">
    <div class="container">
        <ul class="nav nav-tabs generic-tab justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="about-me-tab" data-toggle="tab" href="#about-me"
                    role="tab" aria-controls="about-me" aria-selected="false">
                    About Me
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab"
                    aria-controls="experience" aria-selected="false">
                    Experience
                </a>
            </li>
        </ul>
        <div class="tab-content pt-40px" id="myTabContent">
            <div class="tab-pane fade show active" id="about-me" role="tabpanel"
                aria-labelledby="about-me-tab">
                <div class="card card-item">
                    <div class="card-body">

                        {{$user->bio}}
                    </div>
                </div>
            </div><!-- end tab-pane -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <div class="card card-item">
                    <div class="card-body">
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by injected humour,
                            or randomised words which don't look even slightly believable.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            cupiditate deleniti eius, ex fuga iusto minus,
                            nihil perspiciatis porro provident quasi soluta ut! Consequuntur earum eos magnam?
                        </p>
                        <div class="skills-wrap pt-30px">
                            <div class="skills">
                                <div class="skill">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <span class="fs-16 text-black font-weight-semi-bold pr-3">HTML</span>
                                        <span>99%</span>
                                    </div>
                                    <div class="progress_bg">
                                        <div class="progress_bar"></div>
                                    </div>
                                </div>
                                <div class="skill">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <span class="fs-16 text-black font-weight-semi-bold pr-3">CSS</span>
                                        <span>99%</span>
                                    </div>
                                    <div class="progress_bg">
                                        <div class="progress_bar"></div>
                                    </div>
                                </div>
                                <div class="skill">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <span
                                            class="fs-16 text-black font-weight-semi-bold pr-3">Javascript</span>
                                        <span>95%</span>
                                    </div>
                                    <div class="progress_bg">
                                        <div class="progress_bar"></div>
                                    </div>
                                </div>
                            </div><!-- end skills-->
                        </div>
                    </div>
                </div>
            </div><!-- end tab-pane -->
        </div><!-- end tab-content -->
    </div><!-- end container -->
</div>

