<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ROC app</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- <link rel="stylesheet" href="custom.css"> -->
</head>

<body >
    <div id="app" >
        <nav class=" navbar-expand-md navbar-light  shadow-sm sidenav" style="background-color:#F07310;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }} " style="width: 66%;     filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <ul>
                            @guest
                                @if (Route::has('login'))
                                    <li class="links">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                 @if (Route::has('register'))
                                    <li class="links">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                    <li class="links dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ auth()->user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if(!App\Models\Qualification_file::all()->count() > 0)
                                            @if(!auth()->user()->bpv())
                                            <a class="dropdown-item" id="dropdown-link" href="{{ url('qualification_file') }}">
                                                @if(auth()->user()->education())
                                                    Qualification file
                                                @else
                                                    Competitions
                                                @endif
                                            </a>
                                            @endif
                                        @else
                                        <a class="dropdown-item" id="dropdown-link" href="{{ url('qualification_file/1') }}">
                                                @if(auth()->user()->education())
                                                    Qualification file
                                                @else
                                                    Competitions
                                                @endif
                                            </a>
                                        @endif

                                            @if(auth()->user()->student())
                                            <a class="dropdown-item" id="dropdown-link" href="{{ url('log') }}">
                                                Log hours
                                            </a>
                                            @endif

                                            @if(auth()->user()->education() || auth()->user()->bpv())
                                            <a class="dropdown-item" id="dropdown-link" href="{{ url('profiles') }}">
                                                Students
                                            </a>
                                            @endif

                                            <a class="dropdown-item" id="dropdown-link" href="{{ route('profile', Auth::user()) }}">
                                                Profile
                                            </a>

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                </div>
                
            </div>
        </nav>

        <main class="py-4" style="margin-left: 350px;">
            @yield('content')
        </main>
    </div>
</body>

</html>