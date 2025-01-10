 <!--sidebar wrapper -->
 <div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Category</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.category.index')}}"><i class='bx bx-radio-circle'></i>All Category</a>
                </li>
                <li> <a href="{{route('admin.subcategory.index')}}"><i class='bx bx-radio-circle'></i>All SubCategory</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Instructor</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.instructor.index')}}"><i class='bx bx-radio-circle'></i>All Instructor</a>
                </li>
                <li> <a href="{{route('admin.instructor.active')}}"><i class='bx bx-radio-circle'></i>Active Instructor</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Course</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.course.index')}}"><i class='bx bx-radio-circle'></i>All Courses</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Order</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.order.index')}}"><i class='bx bx-radio-circle'></i>All Orders</a>
                </li>


            </ul>
        </li>








        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Setting</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.mailSetting')}}"><i class='bx bx-radio-circle'></i>Mail Setting</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Report</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.report.index')}}"><i class='bx bx-radio-circle'></i>Report Setting</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Review</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.review.index')}}"><i class='bx bx-radio-circle'></i>All Reviews</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage User</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.manage-user')}}"><i class='bx bx-radio-circle'></i>All Users</a>
                </li>

                <li> <a href="{{route('admin.manage-instructor')}}"><i class='bx bx-radio-circle'></i>All Instructors</a>
                </li>


            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Blog</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.blog-category.index')}}"><i class='bx bx-radio-circle'></i>All Blog Category</a>
                </li>

                <li> <a href="{{route('admin.blog.index')}}"><i class='bx bx-radio-circle'></i>All Blogs</a>
                </li>


            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application Settings</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.slider.index')}}"><i class='bx bx-radio-circle'></i>Manage Slider</a>
                </li>

                <li> <a href="{{route('admin.info.index')}}"><i class='bx bx-radio-circle'></i>Manage Info</a>
                </li>


            </ul>
        </li>













    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
