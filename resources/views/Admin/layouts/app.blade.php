<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/writersBay/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/writersBay/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/writersBay/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/writersBay/css/styles.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'WritersBay') }}
                </a>
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
                                @if (Route::has('Admin.login'))
                                    <a class="nav-link" href="url('/login')">{{ __('Login') }}</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (Route::has('Admin.register'))
                                    <a class="nav-link" href=" url('/register')">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                        @if (Auth::guard('admin')->user()))
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav> --}}

        <!-- Navbar lumino   -->

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span></button>
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'WritersBay') }}
                            </a>
                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                            </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                            </a>
                                            <div class="message-body"><small class="pull-right">3 mins ago</small>
                                                <a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                                            <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
                                            <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                            </a>
                                            <div class="message-body"><small class="pull-right">1 hour ago</small>
                                                <a href="#">New message from <strong>Jane Doe</strong>.</a>
                                            <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="all-button"><a href="#">
                                            <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                                        </a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.container-fluid -->
        </nav>

        <div class="container">


               <!--/The sidebar-->
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                <div class="profile-sidebar">
                    <div class="profile-userpic">
                        <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">{{ Auth::guard('admin')->user()->username }}</div>
                        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="divider"></div>
                <form role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <ul class="nav menu">
                    <li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                    <li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Assignment</a></li>
                    <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                    <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
                    <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
                    <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="sub-item-1">
                            <li><a class="" href="#">
                                <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
                            </a></li>
                            <li><a class="" href="#">
                                <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
                            </a></li>
                            <li><a class="" href="#">
                                <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
                            </a></li>
                        </ul>
                    </li>
                <li><a href="{{ route('Admin.logout')}}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
                </ul>
            </div>
        <!--/.sidebar-->


            <main class="py-4">
                @yield('content')
            </main>



        </div>
    </div>
    <script src="{{ asset('assets/bootstrap4/jquery.1.11.1.js') }}"></script>
    {{-- <script src="{{ asset('assets/bootstrap4/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('assets/writersBay/js/bootstrap.min.js') }}"></script>
    {{-- <script src="js/bootstrap-datepicker.js"></script> --}}
	<script src="{{ asset('assets/writersBay/js/custom.js') }}"></script>
</body>
</html>
