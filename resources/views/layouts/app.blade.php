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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #f5f5f5;">
    <div id="loading_page">
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
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand font-weight-bold" href="{{ url('/') }}" style="font-size: 26px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item{{ (request()->is('home')) ? ' active' : '' }}">
                            <a class="nav-link custom-nav-link" href="{{ route('home') }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item{{ (request()->is('products') || request()->is('product/*')) ? ' active' : '' }}">
                            <a class="nav-link custom-nav-link" href="{{ route('products') }}">{{ __('Product') }}</a>
                        </li>
                        <li class="nav-item{{ (request()->is('contact-us')) ? ' active' : '' }}">
                            <a class="nav-link custom-nav-link" href="{{ route('contact_us') }}">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item text-right">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="slider">
            <div><div style="background-image: url('{{ asset('images/slide/Imprint-1920x400.jpg') }}'); height: 280px; background-size: cover; background-repeat: no-repeat; background-position: center center;"></div></div>
            <div><div style="background-image: url('{{ asset('images/slide/Imprint-1920x400.jpg') }}'); height: 280px; background-size: cover; background-repeat: no-repeat; background-position: center center;"></div></div>
            <div><div style="background-image: url('{{ asset('images/slide/Imprint-1920x400.jpg') }}'); height: 280px; background-size: cover; background-repeat: no-repeat; background-position: center center;"></div></div>
            <div><div style="background-image: url('{{ asset('images/slide/Imprint-1920x400.jpg') }}'); height: 280px; background-size: cover; background-repeat: no-repeat; background-position: center center;"></div></div>
            <div><div style="background-image: url('{{ asset('images/slide/Imprint-1920x400.jpg') }}'); height: 280px; background-size: cover; background-repeat: no-repeat; background-position: center center;"></div></div>
        </div>

        <main class="container">
            @yield('content')
        </main>

        <footer class="footer bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="font-weight-bold">Company Information</h2>
                        <p>Improve Cambodian people’s living with Information Technology. We are committed to challenge what other people do not. Deliver a surprised result beyond clients’ expectation with passion and value.</p>
                    </div>
                    <div class="offset-1 col-md-3">
                        <h2 class="font-weight-bold">Follow us</h2>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div id="map">
                            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7817.997470789702!2d104.9379336360596!3d11.551947899174024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf81e10a76f0fdf02!2sPLAN-B%20Cambodia!5e0!3m2!1sen!2skh!4v1582550569804!5m2!1sen!2skh" width="400" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe> --}}
                        </div>
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
                        <a class="ml-auto p-2 bd-highlight" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="p-2 bd-highlight" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a href="{{ route('admin_dashboard') }}" class="ml-auto p-2 bd-highlight">Admin</a>

                        <a class="p-2 bd-highlight" href="{{ route('logout') }}"
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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function initMap() {
            var location = {lat: 11.5518399, lng: 104.9402093};
            var map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: location});
            var marker = new google.maps.Marker({position: location, map: map});
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDP2Uut1sp28_v1SX6NP0hzwbHOuluRZGo&callback=initMap">
    </script>
</body>
</html>
