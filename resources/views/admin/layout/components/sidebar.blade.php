<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- logo -->
        <a href="{{ route('admin.dashboard.index') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="40" width="210">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" height="40" width="210">
            </span>
        </a>

        <!--- side menu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard.index') }}" class="side-nav-link" title="Dashboard">
                    <i class="dripicons-meter"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.customer.index') }}" class="side-nav-link" title="Customers">
                    <i class="dripicons-meter"></i>
                    <span> Customers </span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Sidebar -left -->
</div>
