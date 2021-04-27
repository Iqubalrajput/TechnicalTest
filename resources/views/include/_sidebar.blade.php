<aside id="sidebar-left" class="sidebar-circle">

    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="{{url('/')}}">
                <img src="{{ asset('images/profile_user.jpg') }}" alt="admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <h4 class="media-heading">Hello, <span>Admin</span></h4>
                <small>Technical Test</small>
            </div>
        </div>
    </div>

    <ul class="sidebar-menu">

        <li {!! Request::is('admin') ? 'class="active"' : null !!}>
            <a href="{{url('/')}}">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Dashboard</span>
                {!! Request::is('dashboard', 'dashboard/index') ? '<span class="selected"></span>' : null !!}
            </a>
        </li>

        <li class="sidebar-category">
            <span>SERVICES MANAGEMENT</span>
            <span class="pull-right"><i class="fa fa-trophy"></i></span>
        </li>
        <li {!! Request::is('company','company/*')? 'class="submenu active"' : 'class="submenu"' !!}>
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <span class="text"> Manage Company</span>
                <span class="arrow"></span>
                {!! Request::is('company', 'company/*') ? '<span class="selected"></span>' : null !!}
            </a>
            <ul>
                <li {!! Request::is('company/create')? 'class="active"' : null !!}><a href="{{url('company/create')}}">Add New Company</a></li>
                <li {!! Request::is('company')? 'class="active"' : null !!}><a href="{{url('company')}}">Company List</a></li>
            </ul>
        </li>
        <li {!! Request::is('admin/service','employee/*')? 'class="submenu active"' : 'class="submenu"' !!}>
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text"> Manage Employee</span>
                <span class="arrow"></span>
                {!! Request::is('employee', 'employee/*') ? '<span class="selected"></span>' : null !!}
            </a>
            <ul>
                <li {!! Request::is('employee/create')? 'class="active"' : null !!}><a href="{{url('employee/create')}}">Add New Employee</a></li>
                <li {!! Request::is('employee')? 'class="active"' : null !!}><a href="{{url('employee')}}">Employee List</a></li>
            </ul>
        </li>
    </ul><!-- /.sidebar-menu -->
    <!--/ End left navigation - menu -->

</aside><!-- /#sidebar-left -->
<!--/ END SIDEBAR LEFT -->