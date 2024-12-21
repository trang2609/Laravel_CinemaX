<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 z-index-1" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="./admin">
            <img src="images/favicon/cinema.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Admin CinemaX</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @can('theater')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/theater">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-tv text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý rạp</span>
                </a>
            </li>
            @endcan
            @can('movie_genre')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/movie_genres">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-theater-masks text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý thể loại phim</span>
                </a>
            </li>
            @endcan
            @can('movies')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/movie">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-film text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý phim</span>
                </a>
            </li>
            @endcan
            @can('events')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/events">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-calendar-check text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý sự kiện</span>
                </a>
            </li>
            @endcan
            @can('discount')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/discount">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-solid fa-badge-percent text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mã khuyến mãi</span>
                </a>
            </li>
            @endcan
            @can('food')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/food">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-solid fa-popcorn text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý đồ ăn</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/combo">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-utensils text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý Combo</span>
                </a>
            </li>
            @endcan
            @can('banners')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/banners">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-rectangle-ad text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý quảng cáo</span>
                </a>
            </li>
            @endcan
                 
            @can('price')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/prices">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-money-bill text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý giá vé</span>
                </a>
            </li>
            @endcan
            @can('schedule_movie')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/schedule">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-calendar-days text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý lịch chiếu</span>
                </a>
            </li>
            @endcan
            @can('ticket')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/ticket">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-solid fa-ticket text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý vé</span>
                </a>
            </li>
            @endcan
            @can('feedback')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/feedback">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-comment-lines text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Phản hồi/Liên hệ</span>
                </a>
            </li>
            @endcan
            @can('user')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/user">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý khách hàng</span>
                </a>
            </li>
            @endcan
            @role('admin')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/staff">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user-tie text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý nhân viên</span>
                </a>
            </li>
            @endrole
            @role('admin')
            <li class="nav-item">
                <a class="nav-link @yield('active')" href="./admin/info">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-regular text-info text-sm  fa-circle-info"></i>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin</span>
                </a>
            </li>
            @endrole
        </ul>
    </div>
</aside>