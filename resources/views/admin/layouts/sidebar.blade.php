<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                        <span key="t-dashboards">Dashboard</span>
                    </a>

                </li>

                <!-- @can('User-View','Role-View','Permission-Create')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-group"></i>
                            <span key="t-tasks">User Management</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            @hasanyrole('Admin')
                            <li><a href="{{ route('user.list') }}">Admin List</a></li>
                            @endhasanyrole
                            
                            @can('User-View')
                            <li><a href="{{ route('user.teachers.list') }}">Teacher List</a></li>
                            @endcan

                            @can('User-View')
                            <li><a href="{{ route('user.students.list') }}">Student List</a></li>
                            @endcan

                            @can('Role-View')
                            <li><a href="{{ route('role.list') }}">Roles</a></li>
                            @endcan

                            @can('Permission-View')
                            <li><a href="{{ route('permission.list') }}">Permissions</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan -->
                
                @can('Booking-View','Booking-Create','Booking-Edit','Booking-Delete')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fab fa-product-hunt"></i>
                            <span key="t-tasks">Booking</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            @can('Booking-Create')
                            <li><a href="{{ route('booking.add') }}">Book Parcel</a></li>
                            @endcan

                            @can('Booking-View')
                            <li><a href="{{ route('booking.list') }}">Book List</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @hasanyrole('Admin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-globe"></i>
                        <span key="t-tasks">Setting</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li>
                        <li><a href="{{ route('admin-brand-settings-general-setting')}}">General Setting</a></li>
                    </ul>
                </li>
                @endhasanyrole

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
