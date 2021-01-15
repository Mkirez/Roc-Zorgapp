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
        <!-- sidenav -->
        <nav class=" navbar-expand-md navbar-light  shadow-sm sidenav" style="background-color:#F07310;">
            <div class="container">
                <div class=" justify-content-center">
                    <div class="col-md-12 text-center no-padding">
                        <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }} " style="width: 66%;     filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <ul class="navbar-ul">
                            @guest
                                @if (Route::has('login'))
                                    <li class="linkjes">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                 @if (Route::has('register'))
                                    <li class="linkjes">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                        <br>


                               


                                   
                                    
                                        @if(!App\Models\Qualification_file::all()->count() > 0)
                                            @if(!auth()->user()->bpv())

                                            <li id="{{ request()->is('qualification_file') ? 'active' : '' }}" class="linkjes">
                                            <button class="gridCheck">
                                                <ion-icon name="options"  >
                                                    
                                                </ion-icon>
                                                
                                                
                                            </button>
                                                
                                                <a href="{{ url('qualification_file') }}" class="gridCheck">
                                                    @if(auth()->user()->education())
                                                        Qualification file
                                                    @else
                                                        Competitions
                                                    @endif
                                                </a>
                                            </li>
                                        <br>

                                            
                                            @endif
                                        @else


                                        <li id="{{ request()->is('qualification_file/1') ? 'active' : '' }}" class="linkjes">
                                            <span class="gridCheck">
                                                    <ion-icon name="options"></ion-icon>
                                                </span>
                                            <a  href="{{ url('qualification_file/1') }}" class="gridCheck">
                                                @if(auth()->user()->education())
                                                    Qualification file
                                                @else
                                                    Competitions
                                                @endif
                                            </a>
                                        </li>
                                        <br>

                                        @endif

                                            @if(auth()->user()->student())
                                        <li id="{{ request()->is('qualification_file/1') ? 'active' : '' }}" class="linkjes">
                                            <span class="gridCheck">
                                                    <ion-icon name="people"></ion-icon>
                                                </span>
                                            <a   href="{{ url('log') }}" class="gridCheck">
                                                Log hours
                                            </a>
                                        </li>
                                        <br>
                                       

                                            @endif

                                            @if(auth()->user()->education() || auth()->user()->bpv())
                                        <li id="{{ request()->is('profiles') ? 'active' : '' }}" class="linkjes">
                                            <span class="gridCheck">
                                                    <ion-icon name="people"></ion-icon>
                                                </span>
                                            <a  href="{{ url('profiles') }}" class="gridCheck">
                                                Students
                                            </a>
                                        </li>
                                        <br>
                                        

                                            @endif
                                        <li id="{{ request()->is('profiles/'. \Auth::user()->id) ? 'active' : '' }}" class="linkjes">
                                           <span class="gridCheck">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            <a  href="{{ route('profile', Auth::user()) }} " class="gridCheck">
                                                Profile
                                            </a>
                                        </li>
                                        <br>
                                        



                                        <li class="linkjes ">
                                           <span class="gridCheck">
                                                    <ion-icon name="log-out"></ion-icon>
                                                </span>
                                            <a class="gridCheck"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </li>
                                        <br>
                                        





                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                          
                                  

                        @endguest



                            
                        </ul>


                        </div>
                    </div>
                </div>
                
            </div>
        </nav>


        <!-- boven nav -->
        <nav class=" navbar-expand-md navbar-light  shadow-sm uppernav" style="background-color:#F07310;">
            <div class="container">
                <div class=" justify-content-center">
                    <div class="col-md-12  no-padding">
                        <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }} " style="width: 37%;     filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); margin-right: 7rem;">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                        



                        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <ul class="navbar-ul">
                            @guest
                                @if (Route::has('login'))
                                    <li class="linkjes">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                 @if (Route::has('register'))
                                    <li class="linkjes">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                        <br>


                               


                                   
                                    
                                        @if(!App\Models\Qualification_file::all()->count() > 0)
                                            @if(!auth()->user()->bpv())

                                            <li class="linkjes">
                                            <button class="gridCheck">
                                                <ion-icon name="options"  >
                                                    
                                                </ion-icon>
                                                
                                                
                                            </button>
                                                
                                                <a  href="{{ url('qualification_file') }}" class="gridCheck">
                                                    @if(auth()->user()->education())
                                                        Qualification file
                                                    @else
                                                        Competitions
                                                    @endif
                                                </a>
                                            </li>
                                        <br>

                                            
                                            @endif
                                        @else


                                        <li class="linkjes">
                                            <span class="gridCheck">
                                                    <ion-icon name="options"></ion-icon>
                                                </span>
                                            <a  href="{{ url('qualification_file/1') }}" class="gridCheck">
                                                @if(auth()->user()->education())
                                                    Qualification file
                                                @else
                                                    Competitions
                                                @endif
                                            </a>
                                        </li>
                                        <br>

                                        @endif

                                            @if(auth()->user()->student())
                                        <li class="linkjes">
                                            <span class="gridCheck">
                                                    <ion-icon name="people"></ion-icon>
                                                </span>
                                            <a   href="{{ url('log') }}" class="gridCheck">
                                                Log hours
                                            </a>
                                        </li>
                                        <br>
                                       

                                            @endif

                                            @if(auth()->user()->education() || auth()->user()->bpv())
                                        <li class="linkjes">
                                            <span class="gridCheck">
                                                    <ion-icon name="people"></ion-icon>
                                                </span>
                                            <a  href="{{ url('profiles') }}" class="gridCheck">
                                                Students
                                            </a>
                                        </li>
                                        <br>
                                        

                                            @endif
                                        <li class="linkjes">
                                           <span class="gridCheck">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            <a  href="{{ route('profile', Auth::user()) }} " class="gridCheck">
                                                Profile
                                            </a>
                                        </li>
                                        <br>
                                        



                                        <li class="linkjes ">
                                           <span class="gridCheck">
                                                    <ion-icon name="log-out"></ion-icon>
                                                </span>
                                            <a class="gridCheck"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </li>
                                        <br>
                                        





                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                          
                                  

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