<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="icon" href="/favicon.ico" />
    <title>Admin - FullFill</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
    <!-- Add this in the <head> section of your HTML -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

</head>

<body style="background-color: rgba(255, 250, 237, 1)">
    <div id="app" class="d-flex">
        <!-- Sidebar-->
        <div class="border-end bg-light" id="sidebar-wrapper">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <img src="{{ asset('/img/logo.png') }}" style="width: 3em" class="me-2" alt="logo">
                    <span class="fs-4">Admin</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    {{-- <li class="nav-item ">
                            <a href="javascript:void(0)" class="nav-link link-dark" aria-current="page">
                                <i class="fa-thin fa-house me-2" style="font-size: 1rem"></i>
                                หน้าแรก
                            </a>
                        </li> --}}
                    {{-- <li>
                            <a href="javascript:void(0)" class="nav-link link-dark">
                                <i class="fa-solid fa-calendar-days me-2" style="font-size: 1rem"></i>
                                รายการสั่งจอง
                            </a>
                        </li> --}}
                    <li>
                        <a href="/admin/order"  class="nav-link link-dark {{ request()->is('/admin/order') ? 'active' : '' }}">
                            <i class="fa-solid fa-calendar-days me-2" style="font-size: 1rem"></i>
                            รายการสั่งจอง
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('be.home.index') }}" class="nav-link link-dark">
                            <i class="fa-solid fa-table-cells-large me-2" style="font-size: 1rem"></i>
                            สินค้า
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <div class="navbar-nav ms-auto mt-2 mt-lg-0" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                        class="rounded-circle me-2">
                                    <strong>
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @endif
                                    </strong>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('be.logout') }}">logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <main id="content">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
