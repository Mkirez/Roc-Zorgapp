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

<body>
    <div id="app" >
        
        <div class="container-fluid">
            <div class="row justify-content-start">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="p-3 logo">
                        <img src="{{ asset('images/logo.png') }}">
                    </div>
                </div>
            </div>
        </div>
       

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>