<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href={{ asset('css/swiper.min.css') }}>

    <!-- Styles -->
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>

<body>
    <div id="app">
        <header class="site-header">
            <div class="header-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-10 col-lg-2 order-lg-1">
                            <div class="site-branding">
                                <div class="site-title">
                                    <a href="/"><img src={{ asset('images/logo.png') }} alt="logo"></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-2 col-lg-7 order-3 order-lg-2">
                            <nav class="site-navigation">
                                <div class="hamburger-menu d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>

                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href={{ route('ticket.index') }}>My Tickets</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                            @guest
                                <div class="buy-tickets">
                                    <a class="btn gradient-bg" href="{{ route('login') }}">Login</a>
                                </div>
                            @else
                                <p href="#" class="text-white mb-0">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>

                                    <a class="btn gradient-bg" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </p>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-white">
                    <figure class="footer-logo">
                        <a href="#"><img src={{ asset('images/logo.png') }} alt="logo"></a>
                    </figure>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                    <div class="footer-social">
                        <ul class="flex flex-wrap justify-content-center align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script type='text/javascript' src={{ asset('js/jquery.js') }}></script>
    <script type='text/javascript' src={{ asset('js/masonry.pkgd.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/jquery.collapsible.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/swiper.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/jquery.countdown.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/circle-progress.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/jquery.countTo.min.js') }}></script>
    <script type='text/javascript' src={{ asset('js/custom.js') }}></script>
</body>

</html>
