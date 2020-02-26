<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #f5f5f5;">
    <div id="loading_page" style="z-index: 999;">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}" style="font-size: 26px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item{{ (request()->is('about')) ? ' active' : '' }}">
                            <a class="nav-link custom-nav-link" href="{{ route('home') }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item dropdown{{ (request()->is('products') || request()->is('product/*')) ? ' active' : '' }}">
                            <a class="nav-link custom-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Product') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('products') }}">Product List</a>
                                <div class="dropdown-divider"></div>
                                @foreach ($products as $prod)
                                    <a class="dropdown-item text-capitalize" href="{{ route('product_details', ['id' => $prod->id]) }}">{{ $prod->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item{{ (request()->is('contact-us')) ? ' active' : '' }}">
                            <a class="nav-link custom-nav-link" href="{{ route('contact_us') }}">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item text-right">
                            <input type="text" name="search" id="search_products" class="form-control" placeholder="Search..." aria-describedby="button-addon2">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="slider">
            @foreach ($sliders as $slider)
                <div>
                    <div style="background-image: url('{{ asset($slider->path) }}'); height: 280px; background-size: cover; background-repeat: no-repeat; background-position: center center;"></div>
                </div>
            @endforeach
        </div>

        <main>
            @yield('content')
        </main>

        <footer class="footer bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mb-5">
                        <h2 class="font-weight-bold">Company Information</h2>
                        <p>
                            Improve Cambodian people’s living with Information Technology.<br>
                            We are committed to challenge what other people do not. Deliver a surprised result beyond clients’ expectation with passion and value.
                        </p>
                    </div>
                    <div class="col-md-3 mb-5">
                        <h2 class="font-weight-bold">Follow us</h2>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="https://www.facebook.com/lovsokheang" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="https://www.instagram.com/kheang_lov/" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" href="https://www.youtube.com/channel/UCMYBSHJy4UWVpJoTDh50ZpA?view_as=subscriber" target="_blank">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="border-top bg-white">
            <div class="container">
                <div class="d-flex bd-highlight">
                    <div class="p-2 bd-highlight"></div>
                    <div class="p-2 bd-highlight"></div>
                    @guest
                        <a class="ml-auto p-2 bd-highlight text-secondary text-decoration-none" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="p-2 bd-highlight text-secondary text-decoration-none" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ route('admin_dashboard') }}" class="ml-auto p-2 bd-highlight text-secondary text-decoration-none">Admin</a>

                        <a class="p-2 bd-highlight text-secondary text-decoration-none" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function initMap() {
            var location = {lat: 11.5518399, lng: 104.9402093};
            var map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: location});
            var marker = new google.maps.Marker({position: location, map: map});
        }
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP2Uut1sp28_v1SX6NP0hzwbHOuluRZGo&callback=initMap">
    </script>
</body>
</html>
