<!DOCTYPE html>
<html>
<head>
   @include('sections.meta-data')
   @include('sections.style')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('sections.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('sections.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('page-header')

        <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>

            <!-- /.content -->
            @yield('modals')
        </div>
        <!-- /.content-wrapper -->

     {{--Footer section--}}
    @include('sections.footer')


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
@include('sections.footer-scripts')
@yield('scripts-footer')

</body>
</html>
