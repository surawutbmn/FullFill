<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="icon" href="/favicon.ico" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css">
</head>

<body style="background-color: rgba(255, 250, 237, 1)">
    <div id="app">
        <header style="background-color: rgba(173, 137, 103, 1);">
            <nav id="nav" class="navbar text-light sticky-top navbar-expand-lg be-bg-light fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand me-auto" href="{{ route('be.home.index') }}"
                        style="color: rgba(242, 242, 242, 1);">Seller Page</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav nav-be ms-auto ">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('fe.product') }}">Porduct</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('seller.order') }}">order</a>
                            </li>
                            {{-- @php
                                $user = auth()->user();
                                $hasShop = $user->shop ? true : false;
                                dd($user, $hasShop); // Add this line for debugging
                            @endphp --}}
                            @if (auth()->user()->shop)
                                <li class="nav-item">
                                    <a class="nav-link text-light"
                                        href="{{ route('shops.detail', ['id' => auth()->user()->shop->id]) }}">Shop</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('seller.create') }}">Create Shop</a>
                                </li>
                            @endif


                            @if (Auth::check())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>
            </nav>
        </header>
        <main id="content">
            @yield('content')
        </main>
        {{-- <footer>
        <div class="bgc-primary ">
            <div class="container d-flex justify-content-center pd-20 align-items-center">
                    <div class="p-4 mt-3 justify-content-center d-flex" >
                        <div class="d-flex justify-content-center">
                            <span> Copyright © 2023 Refill Shop </span>
                        </div>
                </div>
            </div>
        </div>
    </footer> --}}
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
</body>

</html>
