<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blackspot Detector System</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
    <div id="app d-md-flex">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ route('landingpage') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @else
                    @if(Auth::user()->username == 'admin')
                        <a class="navbar-brand" href="{{ route('home-admin') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ route('home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    @endif
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('landingpage') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                        @if(Auth::user()->username == 'admin')
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('location-by-list-admin') }}">Lokasi Daerah Rawan Kecelakaan</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="#">Belum Tahu Ini Buat Apa</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('statistics-admin') }}">Statistik</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('about') }}">About</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('userprofile-admin') }}">
                                            View Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('location-by-list') }}">Lokasi Daerah Rawan Kecelakaan</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('device') }}">Perangkat Saya</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('statistics') }}">Statisktik</a>
                                </li>
                                <li class="nav-item px-1">
                                    <a class="nav-link" href="{{ route('about') }}">About</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('userprofile') }}">
                                            View Profile
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container pt-3 px-3">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <h1 class="display-3"><b>Tentang Kami</b></h1>
                        <p class="lead">
                            Blackspot Detector System merupakan sebuah sistem untuk mendeteksi daerah rawan kecelakaan yang terdiri dari sebuah perangkat dan website.
                            Perangkat yang dimaksud adalah BlackSpot Detector (BSD) yang digunakan oleh pengguna untuk diaplikasikan dikendaraan (motor atau mobil) yang berguna untuk mendeteksi lokasi daerah rawan kecelakaan terdekat yang tersebar di suatu daerah dan mengirimkan data statis pengguna berupa kecepatan kendaraan pengguna.
                            Website ini gunakan sebagai pusat informasi mengenai daerah rawan kecelakaan, pengguna, perangkat, dan statistik pengguna.
                            Selain itu website ini dapat digunakan untuk menambahkan lokasi daerah rawan kecelakaan oleh pengguna ketika melewati daerah rawan kecelakaan yang belum tersedia di sistem.
                            Blackspot Detector System diharapkan dapat bermanfaat untuk pengguna jalan dan dapat meningkatkan kewaspadaan pengendara khususnya ketika melewati daerah rawan kecelakaan.
                        </p>
                    </div>
                    <div class="col-md-6">
                    <img src="{{ asset('img/About-Square.png') }}" class="img-fluid" alt="Blackspot Detector System">
                    </div>
                </div>
            </div>
        </main>
    </div>
    </body>
</html>
