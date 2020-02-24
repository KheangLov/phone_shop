<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user_id" content="{{ Auth::check() ? Auth::user()->id : '' }}">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
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
    <div id="admin" class="d-none">

        <aside id="sidebar" class="sidebar">
            <a href="{{ route('admin_dashboard') }}" class="sidebar-header">
                <span id="side-header" class="header-title font-weight-bolder">{{ config('app.name', 'Laravel Admin') }}</span>
            </a>
            <a href="{{ route('admin_dashboard') }}" class="sidebar-link">
                <div class="inner-link{{ (request()->is('admin')) ? ' active' : '' }}">
                    <span class="link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </span>
                    <span class="link-text">Dashboard</span>
                </div>
            </a>
            @if (strtolower(Auth::user()->role->name) === 'admin')
                <a href="{{ route('user_list') }}" class="sidebar-link">
                    <div class="inner-link{{ (request()->is('admin/user') || request()->is('admin/user/*')) ? ' active' : '' }}">
                        <span class="link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user ">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        <span class="link-text">Users</span>
                    </div>
                </a>
            @endif
            <a href="{{ route('product') }}" class="sidebar-link">
                <div class="inner-link{{ (request()->is('admin/product') || request()->is('admin/product/*') || request()->is('admin/images') || request()->is('admin/images/*')) ? ' active' : '' }}">
                    <span class="link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail ">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </span>
                    <span class="link-text">Emails</span>
                </div>
            </a>
            <a href="{{ route('category.index') }}" class="sidebar-link">
                <div class="inner-link{{ (request()->is('admin/category') || request()->is('admin/category/*') || request()->is('admin/sub-category') || request()->is('admin/sub-category/*')) ? ' active' : '' }}">
                    <span class="link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3" y2="6"></line>
                            <line x1="3" y1="12" x2="3" y2="12"></line>
                            <line x1="3" y1="18" x2="3" y2="18"></line>
                        </svg>
                    </span>
                    <span class="link-text">Categories</span>
                </div>
            </a>
            <a href="{{ route('product') }}" class="sidebar-link">
                <div class="inner-link{{ (request()->is('admin/product') || request()->is('admin/product/*') || request()->is('admin/images') || request()->is('admin/images/*')) ? ' active' : '' }}">
                    <span class="link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                            <rect x="1" y="3" width="22" height="5"></rect>
                            <line x1="10" y1="12" x2="14" y2="12"></line>
                        </svg>
                    </span>
                    <span class="link-text">Products</span>
                </div>
            </a>
        </aside>

        <div class="main-wrapper">
            <nav class="navbar navbar-expand navbar-custom bg-custom text-nowrap">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link mr-3" id="btn_side_collapse" href="#" style="padding: 0 0 0 10px; font-size: 24px;">
                                <i class="fas fa-bars" id="btn_side_collapse_icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <h2 class="text-white d-none d-md-block">
                                @if (request()->is('admin/product') || request()->is('admin/product/*'))
                                    Products
                                @elseif (request()->is('admin/user') || request()->is('admin/user/*'))
                                    Users
                                @elseif (request()->is('admin/category') || request()->is('admin/category/*'))
                                    Categories
                                @else
                                    Dashboard
                                @endif
                            </h2>
                        </li>
                    </ul>
                    <ul class="navbar-nav" id="app">
                        @if (Auth::user()->role->name === 'admin')
                            <notification-component :userid="{{ Auth::user()->id }}" :notifications="{{ Auth::user()->notifications }}" :unreads="{{ Auth::user()->unreadNotifications }}"></notification-component>
                        @endif
                        <li class="nav-item">
                            <div class="current-user text-right">
                                <span class="user-name d-block">
                                    {{ Auth::user()->name }}
                                </span>
                            </div>
                        </li>
                        <li class="nav-item dropdown custom-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropDown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="overlay-profile">
                                    <div class="profile" style="background-image: url('{{ asset(Auth::user()->profile ? Auth::user()->profile : 'images/avatar_profile_user_music_headphones_shirt_cool-512.png') }}');"></div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu" aria-labelledby="userDropDown">
                                <a class="dropdown-item" href="{{ route('user_detail', ['id' => Auth::user()->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-1">Profile</span>
                                </a>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span class="ml-1">Home</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out w-4 h-4">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-1">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
            <footer id="footer">
                <div class="text-white-50 mt-4 text-nowrap">
                    © <span id="cpyr_year"></span>, Made with
                    <div class="d-inline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart stroke-current text-danger w-6 h-6" style="vertical-align: top;">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    by KHEANG
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
