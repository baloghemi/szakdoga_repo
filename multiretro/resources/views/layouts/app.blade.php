<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MultiRetro') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'MultiRetro') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <!-- Left Side Of Navbar 
                    <ul class="navbar-nav mr-auto"></ul> -->
                   

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Regisztráció') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('userProfile') }}">{{ __('Profil') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('teams') }}">{{ __('Csapatok') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('meetings') }}">{{ __('Megbeszélés') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('actionpoints') }}">{{ __('Akciópontok') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blogs') }}">{{ __('Blogok') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('diary') }}">{{ __('Napló') }}</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Kijelentkezés') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>  
        
        <style>            
            .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 60px;
                line-height: 60px;
                background-color: #f5f5f5;
            }
        </style>

        <br><br>
        
        <footer class="footer text-center">        
            <div class="container">
                <span class="text-muted">Fejlesztő: Balogh Emese | Telefon: xy | E-mail: ii1ank@inf.elte.hu</span>
            </div>
        </footer>
    </div>
    
</body>
</html>