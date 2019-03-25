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
    {{-- <link href="{{ asset('assets/writersBay/DataTables4/datatables.css') }}" rel="stylesheet"> --}}

    <style>
    .tb_data{
        cursor: pointer;
    }.crd{
        padding: 200px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        color: red !important;
    }

    </style>

</head>
<body>
    <div id="appy">
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
                            <a class="navbar-brand" href="{{ route('Admin.home') }}">
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

        <div class="container-fluid">
            <!--/The sidebar-->
            <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                        </div>
                        <div class="profile-usertitle">
                            @if (Auth::guard('admin')->user())
                            <div class="profile-usertitle-name">{{ Auth::guard('admin')->user()->username }}</div>
                            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>

                            @endif
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="divider"></div>
                    {{-- <form role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form> --}}
                    <ul class="nav menu">
                        <li class="active"><a href="{{ route('Admin.home') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                        <li class="parent "><a data-toggle="collapse" href="#assg">
                            <em class="fa fa-navicon">&nbsp;</em> Assignments <span data-toggle="collapse" href="#assg" class="icon pull-right"><em class="fa fa-plus"></em></span>
                            </a>
                            <ul class="children collapse" id="assg">
                                <li><a class="" href="{{ route('Admin.viewAssg') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span> View Assg
                                </a></li>
                                <li><a class="" href="{{ route('Admin.onProgress') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> On Progress
                                    </a></li>
                                <li><a class="" href="{{ route('Admin.underReview') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Under Review
                                    </a></li>
                                <li><a class="" href="{{ route('Admin.uploadAssg') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span> Upload Assg
                                </a>
                                </li><li><a class="" href="{{ route('Admin.onRevision') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span> Under Revision
                                </a></li>
                                <li><a class="" href="{{ route('Admin.pendingPay') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span> Assg Pending Pay
                                </a></li>
                            </ul>
                        </li>
                        <li class="parent "><a data-toggle="collapse" href="#users">
                            <em class="fa fa-user">&nbsp;</em> Writers <span data-toggle="collapse" href="#users" class="icon pull-right"><em class="fa fa-plus"></em></span>
                            </a>
                            <ul class="children collapse" id="users">
                                <li><a class="" href="{{ route('Admin.viewUsers') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span> View Writers
                                </a></li>
                                @if (Auth::guard('admin')->user()->role->name == 'superadmin')
                                <li><a class="" href="{{ route('Admin.editUsers') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span> Edit Writers
                                </a></li>
                                    @endif
                            </ul>
                        </li>
                        {{-- <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                        <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
                        <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> --}}
                    @if (Auth::guard('admin')->user()->role->name == 'superadmin')
                    <li><a href="{{ route('Admin.roles')}}"><em class="fa fa-forumbee">&nbsp;</em> Roles</a></li>
                    <li><a href="{{ route('Admin.categories')}}"><em class="fa fa-bookmark-o">&nbsp;</em> Categories</a></li>

                    <li class="parent "><a data-toggle="collapse" href="#admins">
                        <em class="fa fa-user-plus">&nbsp;</em> Admins <span data-toggle="collapse" href="#admins" class="icon pull-right"><em class="fa fa-plus"></em></span>
                        </a>
                        <ul class="children collapse" id="admins">
                            <li><a class="" href="{{ route('Admin.viewAdmins') }}">
                                <span class="fa fa-arrow-right">&nbsp;</span> View Admins
                            </a></li>
                            <li><a class="" href="{{ route('Admin.editAdmins') }}">
                                <span class="fa fa-arrow-right">&nbsp;</span> Edit Admins
                            </a></li>
                            <li><a class="" href="{{ route('Admin.addAdmins') }}">
                                <span class="fa fa-arrow-right">&nbsp;</span> Add Admin
                            </a></li>
                        </ul>
                    </li>
                    @endif
                    <li><a href="{{ route('Admin.settings')}}"><em class="fa fa-cog">&nbsp;</em> Settings</a></li>



                    <li><a href="{{ route('Admin.logout')}}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
                    </ul>
                </div>
            <!--/.sidebar-->


                <main class="py-2">
                    @yield('content')
                </main>

                @component('utils.modal_wrapper', ["title"=>" This is where additional Information is displayed"])

                @endcomponent

        </div>
        <!-- .container -->
    </div>
    <script src="{{ asset('assets/bootstrap4/jquery.1.11.1.js') }}"></script>
    {{-- <script src="{{ asset('assets/bootstrap4/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('assets/writersBay/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/writersBay/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('assets/writersBay/DataTables4/datatables.min.js') }}"></script> --}}
    {{-- <script src="js/bootstrap-datepicker.js"></script> --}}
    <script src="{{ asset('assets/writersBay/js/chart.min.js') }}"></script>
	<script src="{{ asset('assets/writersBay/js/chart-data.js') }}"></script>
	<script src="{{ asset('assets/writersBay/js/easypiechart.js') }}"></script>
	<script src="{{ asset('assets/writersBay/js/easypiechart-data.js') }}"></script>
    <script>
            $(document).ready(function() {
                // $('#dataTables-example').DataTable({
                //         responsive: true
                // });
				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
				});
			});

        </script>
    @yield('bottom-scripts')
</body>
</html>
