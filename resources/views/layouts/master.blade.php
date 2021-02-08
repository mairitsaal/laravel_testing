<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <!-- Scripts
    <script src="{{ asset('js/app.js') }}" defer></script>-->


    <!--Favicon-->
    <link rel="icon" href="{{ URL::asset('heart.jpg') }}" type="image/x-icon"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a8018f10c4.js" crossorigin="anonymous"></script>
    <script src="bootstrap-validate.js"></script>


    <!--Style-->
    <link rel="stylesheet" type="text/css" href="/css/app.css?<?php echo time(); ?>" />
   <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <style>

    </style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="background-color: #E60011; color: #f8f9fa; border: 1px solid #fff;">
        <div class="container">
            <a class="navbar-brand d-flex align-content-center" href="{{ url('/') }}">
                <div><img src="/svg/heartWhite.svg" style="height:50px;" class="pr-3 pb-2"></div>
                <div style="color: #fff; font-size: 1.0rem; border-left: 1px solid #fff; height: 50%; margin-top: 10px;" class="pl-3">Praktika korraldussüsteem</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

    <main class="py-4">

        @yield('content')
    </main>
</div>


<footer style="border: 1px solid #fff;">
    <div class="container-fluid mt-4">
        <p class="footer">
            Nooruse 5, Tartu 50411  ·  737 0200  ·  www.nooruse.ee  ·
            <span class="obfuscated-link-text">&#110;&#111;&#111;&#114;&#117;&#115;&#101;&#40;&#97;&#116;&#41;&#110;&#111;&#111;&#114;&#117;&#115;&#101;&#46;&#101;&#101;</span>
            <a href="https://www.facebook.com/ttktartu/" target="_blank"><i class="fa fa-facebook fa-lg ml-2" style="color: #fff;"></i></a>
            <a href="https://www.instagram.com/tervishoiukorgkool/" target="_blank"><i class="fa fa-instagram fa-lg ml-2" style="color: #fff;"></i></a>
            <a href="https://www.youtube.com/channel/UCrjggZNKlJ4BHVFxVBd1UaQ" target="_blank"><i class="fa fa-youtube fa-lg ml-2" style="color: #fff;"></i></a>
        </p>
    </div>
</footer>
<!--Js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>
