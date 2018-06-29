<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light  bg-light">
            <div class="container">
                {{-- lien sur logo --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- logo --}}

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- lien accueil --}}
                        <li class="nav-item{{ (Route::currentRouteName() == 'home') ? ' active': '' }}">
                            <a class="nav-link" href="{{URL::to('/')}}">
                                {{ __('Home')}}
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item{{ (Route::currentRouteName() == 'login') ? ' active': '' }}">
                                <a class="nav-link" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            <li class="nav-item{{ (Route::currentRouteName() == 'register') ? ' active': '' }}">
                                <a class="nav-link" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </li>
                        @else
                        @if(Auth::user()->role == 4)
                    {{-- lien admin si role 4 --}}
                    <li class="nav-item{{ (Route::getCurrentRoute()->getPrefix() == '/admin') ? ' active': ''}}">
                        <a class='nav-link' href="{{ route('admin')}}">
                            {{ __('Admin') }}
                        </a>
                    </li>
                    @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    {{-- lien profil --}}
                                    <a class="dropdown-item" href="{{ route('profil') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    {{--  lien changement password  --}}
                                    <a class="dropdown-item" href="{{ route('changePassword') }}">
                                        {{ __('Change Password') }}
                                    </a>                                    
                                    {{-- lien logout --}}
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
                        @endguest
                    </ul>
                </div>

            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {!! $calendar_details->script() !!}
</body>
</html>