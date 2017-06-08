<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li @if(strpos(\Request::route()->getName(),'dashboard')) class="active" @endif>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li @if(strpos(\Request::route()->getName(),'employees')) class="active" @endif>
                <a href="{{ route('admin.employees.index') }}">
                    <i class="fa fa-users"></i> <span>Employees</span>
                </a>
            </li>

            <li @if(strpos(\Request::route()->getName(),'assets')) class="active" @endif>
                <a href="{{ route('admin.assets.index') }}">
                    <i class="fa fa-keyboard-o"></i> <span>Assets</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>