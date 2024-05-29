<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Care Connect</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-icon.png') }}" alt="" width="50" class="me-2">
                    <h4 class="d-inline fw-bold m-0">CARE CONNECT</h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Center Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#about">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('education') }}">Edukasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('forums.index') }}">Forum</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->is_admin)
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">Admin Panel</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('forums.list') }}">Forum Saya</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-pink-subtle" style="min-height: 69vh">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <footer>
            <div class="container-fluid text-center py-3 bg-pink-dark">
                <div class="container rounded text-light">
                    <div class="row">
                        <div class="col mt-1 text-start">
                            <img src="{{ asset('img/logo-side.png') }}" alt="" width="100">
                            <p class="">Kami di Care Connect siap membantu Anda 24/7. Jangan ragu untuk menghubungi kami jika Anda membutuhkan bantuan atau memiliki pertanyaan.</p>
                        </div>
                        <div class="col">
                            <div class=" text-center">
                                <p>Alamat Kantor: Jl. Pelindung No. 123, Malang, Indonesia</p>
                            </div>
                            <ul class="nav justify-content-center fs-2">
                                <li class="nav-item me-2">
                                    <a href="https://www.instagram.com/careconnect" class="nav-link">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="nav-item me-2">
                                    <a href="https://wa.me/62123456789" class="nav-link">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li class="nav-item me-2">
                                    <a href="mailto:support@careconnect.org" class="nav-link">
                                        <i class="fa-regular fa-envelope"></i>
                                    </a>
                                </li>
                                <li class="nav-item me-2">
                                    <a href="https://www.google.com/maps" class="nav-link">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/vendor/jquery-3.6.3.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/c621075835.js" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
