<!-- Header section -->
 <!--
<style>
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
    }
</style>
-->

<style>
    .navbar {
        background-color: #ffffff;
    }

    .navbar-brand img {
        height: 50px;
    }

    .navbar-toggler {
        background-color: #72be43;
    }

    .navbar-nav .nav-link {
        color: #72be43;
        font-weight: bold;
    }

    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
        color: #72be43;
        text-decoration: none;
    }

    .nav-item .nav-link.dropdown {
        color: #72be43;
        font-weight: bold;
    }

    .dropdown-menu {
        background-color: #72be43;
    }

    .dropdown-menu .dropdown-item {
        color: #ffffff;
    }

    .dropdown-menu .dropdown-item:hover {
        color: #ffffff;
        text-decoration: underline;
    }
</style>

<nav class="header navbar navbar-expand-lg navbar-dark shadow" style="background-color: #ffffff">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/images/logo/logo2.png" alt="CinemaX Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav text-uppercase mx-auto">
                <li class="nav-item">
                    <a class="nav-link @yield('movies')" href="/movies" role="button" >NOW SHOWING</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('events')" href="/events" >TIN TỨC/SỰ KIỆN</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link @yield('support')" href="/contact" >LIÊN HỆ</a>
                </li>

            </ul>
            @if(Auth::check())
                <div class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        <span class="d-sm-inline d-none">{{ Auth::user()->fullName }}</span>
                    </a>

                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item link-light" href="/profile">Thông tin cá nhân</a></li>
                        <li><a class="dropdown-item link-light" href="/signOut">Đăng xuất</a></li>
                    </ul>
                </div>
            @else
                <div class="nav-item mx-2 float-end">
                    <a class="nav-link text-success" href="#loginModal" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Đăng nhập
                    </a>
                </div>

            @endif

        </div>

    </div>
</nav>
