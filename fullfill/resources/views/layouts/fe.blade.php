<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" />
    <title>@yield('title')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
    <style>
        .nav-item.active {
            text-decoration: underline 1px;
        }

        .nav-item.active a.nav-link {
            color: #8b7962;
            font-weight: 700;
        }
    </style>
</head>

<body style="background-color: rgba(255, 250, 237, 1)">
    <div id="app">
        <header style="background-color: rgba(255, 244, 218, 1);">
            <nav class="navbar navbar-expand-md bgc-primary shadow-sm fixed-top">
                <div class="container">
                    <a class="logo d-flex align-items-center navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('/img/logo.png') }}" style="width: 2em" alt="">
                        <span class="ms-2">FullFill</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">หน้าแรก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('fe.product') }}">สินค้า</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/shop">ร้านค้า</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/news&activity">ข่าวสาร</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active tooltip1" aria-current="page"
                                    href="{{ route('fe.toorder') }}">
                                    <span class="tooltiptext1">รายการสั่งจอง</span>
                                    <i class="fa-regular fa-file-lines" style="color: #877a6e;"></i></a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link active tooltip1" aria-current="page" href="javascript:void(0)">
                                    <span class="tooltiptext1">โปรไฟล์</span>
                                    <i class="fa-solid fa-bag-shopping" style="color: #877a6e;"></i></a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active tooltip1" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="tooltiptext1">โปรไฟล์</span>
                                    <i class="fa-solid fa-user" style="color: #877a6e;"></i>
                                    @auth
                                        {{ Auth::user()->name }}
                                    @endauth
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @auth
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">ออกจากระบบ</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('login.index') }}">เข้าสู่ระบบ</a></li>
                                        <li><a class="dropdown-item" href="{{ route('be.register.buyer') }}">สร้างบัญชี</a>
                                        </li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                    {{-- </nav> --}}
                    {{-- @if (Auth::check())

                           <li class="nav-item">
                               <a class="nav-link" href="{{route('be.home.create')}}">Create</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="{{route('be.home.index')}}">Admin</a>
                           </li>
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                   {{Auth::user()->name}}
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end">
                                   <li><a class="dropdown-item" href="{{route('be.logout')}}">logout</a></li>
                               </ul>
                           </li>
                       @endif 
                    </ul>
                </div> --}}
                </div>
            </nav>
        </header>
        <main id="content">
            @yield('content')
        </main>
        <footer id="footer">
            <div class="bgc-primary ">
                <div class="container d-flex justify-content-center pd-20 align-items-center">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-5 col-md-3">
                            <h3 class="d-none d-md-block">FullFill</h3>
                            <h5 class="d-md-none">FullFill</h5>
                            <p>ลดปัญหาขยะพลาสติกด้วยการ Refill กันเถอะ</p>
                        </div>
                        <div class="col-5 col-md-3">
                            <h3 class="d-none d-md-block">Quick Menu</h3>
                            <h5 class="d-md-none">Quick Menu</h5>
                            <ul class="foot-list">
                                <li class="foot-list-item">สินค้า</li>
                                <li class="foot-list-item">ร้านค้า</li>
                                <li class="foot-list-item">ข่าวสาร</li>
                                <li class="foot-list-item">เกี่ยวกับเรา</li>
                            </ul>
                        </div>
                        <div class="col-5 col-md-3">
                            <h3 class="d-none d-md-block">Contact As</h3>
                            <h5 class="d-md-none">Contact As</h5>
                            <ul class="foot-list">
                                <li class="foot-list-item"><a href="tel:+063317xxxx">063-xxx-xxxx</a></li>
                                <li class="foot-list-item"><a href="javacrciptVoid(0)" target="_blank"
                                        rel="noopener noreferrer">www.Refiil7681.com</a></li>
                                <li class="foot-list-item"><a href="javacrciptVoid(0)" target="_blank"
                                        rel="noopener noreferrer">Refiil7691@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="col-5 col-md-3">
                            <h3 class="d-none d-md-block">Work With Us</h3>
                            <h5 class="d-md-none">Work With Us</h5>
                            <a class="mt-2 btn btn-prm" href="{{ route('be.register.seller') }}" target="_blank"
                                rel="noopener noreferrer">สมัครเป็นร้านค้า</a>
                        </div>
                        <div class="p-4 mt-3 justify-content-center d-flex">
                            <div class="d-flex w-75 justify-content-center">
                                <span class="mt-4"> Copyright © 2023 FullFill </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var currentUrl = window.location.href;

            var navLinks = document.querySelectorAll('.navbar-nav a.nav-link');

            navLinks.forEach(function(link) {
                if (link.href === currentUrl) {
                    link.parentElement.classList.add('active');
                }
            });
        });
    </script>
</body>

</html>
