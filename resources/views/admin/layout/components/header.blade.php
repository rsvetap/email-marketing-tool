<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#"
               role="button" aria-haspopup="false"
               aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{ asset('assets/admin/images/user.svg') }}" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{ auth()->user()->name ?? '-' }}</span>
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                <!-- item-->

                <a href="{{ route('admin.auth.logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                   class="dropdown-item notify-item">
                    <i class="mdi mdi-logout"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left disable-btn">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
