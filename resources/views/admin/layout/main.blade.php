<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

@include('admin.layout.components.head')

<body>

<!-- ========== Page START  ========== -->
<div class="wrapper">

    <!-- ========== Left Sidebar START ========== -->
    @include('admin.layout.components.sidebar')
    <!-- ========== Left Sidebar END ========== -->

    <!-- ============================================================== -->
    <!-- START Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">

        <!-- ========== Top Sidebar START ========== -->
        @include('admin.layout.components.header')
        <!-- ========== Top Sidebar END ========== -->

        <!-- ========== Content START ========== -->
        <div class="content">
            <div class="container-fluid">
                @yield('content-wrapper')
            </div>
        </div>
        <!-- ========== Content END ========== -->

        <!-- ========== Footer START ========== -->
        @include('admin.layout.components.footer')
        <!-- ========== Footer END ========== -->

    </div>
    <!-- ============================================================== -->
    <!-- END Page content -->
    <!-- ============================================================== -->
</div>
<!-- ========== Page END  ========== -->
@include('admin.layout.components.scripts')

</body>
</html>
