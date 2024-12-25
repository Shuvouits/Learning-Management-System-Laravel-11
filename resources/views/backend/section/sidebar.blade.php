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






    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
