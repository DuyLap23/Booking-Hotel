<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href=""><img src="{{ asset('themes/admin/img/logo.png') }}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="has-arrow" href=" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('themes/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Dashboard</span>
            </a>
            <ul>

            </ul>
        </li>
        <li class>
            <a class="has-arrow" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{ asset('themes/admin/img/menu-icon/2.svg') }}" alt>
                </div>
                <span>Hotels</span>
            </a>
            <ul>
                <li><a href="{{ route('admin.hotels.index') }}">List Hotels</a></li>
                <li><a href="{{ route('admin.hotels.create') }}">Add Hotels</a></li>

            </ul>
        </li>

    </ul>
</nav>
