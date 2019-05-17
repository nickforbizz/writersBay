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
    }.arriveOrders{
      background: aquamarine;
      padding: 30px;
      border-radius: 15px;
      margin-bottom: 10px;
      cursor: pointer;
      position: absolute;
      left: 80%;
      top: -32px;
     }.navbar-custom {
        background: #30c047;
        height: 60px;
    }.sidebar ul.nav .active a{
        color: #fff;
        background-color: #28e09b;
    }.sidebar ul.nav a:hover, .sidebar ul.nav li.parent ul li a:hover {
       text-decoration: none;
       background-color: #28e09b;
       color: #fff;
    }.sidebar ul.nav li.current a {
         background-color: #30ff6b;
         color: #fff !important; }


    </style>
    @yield('top-styles')
</head>
<body>
    <div id="appy">

    <?php
    $pf = "public/";
    $userFile = str_replace($pf, '', \App\Models\WriterMediaProfile::
    where('user_id',Auth::guard('web')
        ->user()
        ->id)
        ->first()
        ->media_link)
    ?>

        <!-- Navbar lumino   -->

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span></button>
                            <a class="navbar-brand" href="{{ route('Web.home') }}">
                                {{ config('app.name', 'WritersBay') }}
                            </a>

                        <ul class="nav navbar-top-links navbar-right">

                            <notification-component></notification-component>

                        </ul>
                    </div>
                </div>
                <!-- /.container-fluid -->
        </nav>

        <div class="container-fluid">
            <!--/The sidebar-->
            @isset($page)

                @if ($page != "ordersPage" )
                <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                        <div class="profile-sidebar">
                            <div class="profile-userpic">

                                @if($userFile == '' || $userFile == null)
                                    <img src="{{ asset('assets/writersBay/img/3d_graffiti-wallpaper-2560x1440.jpg') }}"
                                         alt="User Profile"  class="img-responsive" id="default-imgPrf"/>
                                @else

                                    <img src="{{ asset( 'storage/'.$userFile)}}"
                                         alt="User Profile"  class="img-responsive" id="default-imgPrf"/>
                                @endif


                            </div>
                            <div class="profile-usertitle">
                                @if (Auth::guard('web')->user())
                                <div class="profile-usertitle-name">{{ Auth::guard('web')->user()->username }}</div>
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
                            <li class="active"><a href="{{ route('Web.home') }}"><em class="fa fa-dashboard">&nbsp;</em> Home</a></li>
                            <li class=""><a href="{{ route('Web.orders') }}"><em class="fa fa-clone">&nbsp;</em> View Orders</a></li>
                            <li class="parent "><a data-toggle="collapse" href="#assg">
                                    <em class="fa fa-folder-open color-teal">&nbsp;</em>Assignments <span data-toggle="collapse" href="#assg" class="icon pull-right"><em class="fa fa-plus"></em></span>
                                </a>
                                <ul class="children collapse" id="assg">
                                    <li><a class="" href="{{ route('Web.progressAssg') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> On Progress
                                    </a></li>
                                    {{-- <li><a class="" href="{{ route('Web.uploadAssg') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Upload
                                    </a></li> --}}
                                    <li><a class="" href="{{ route('Web.reviewAssg') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Under Review
                                    </a></li>
                                    <li><a class="" href="{{ route('Web.revision') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Revision
                                    </a></li>
                                </ul>
                            </li>


                            <li class="parent "><a data-toggle="collapse" href="#payment">
                                    <em class="fa fa-paypal color-red">&nbsp;</em>  Job Payment <span data-toggle="collapse" href="#payment" class="icon pull-right"><em class="fa fa-plus"></em></span>
                                </a>
                                <ul class="children collapse" id="payment">
                                    <li><a class="" href="{{ route('Web.pendingAssg') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Pending
                                    </a></li>
                                    <li><a class="" href="{{ route('Web.paidAssg') }}">
                                        <span class="fa fa-arrow-right">&nbsp;</span> Paid
                                    </a></li>
                                </ul>
                            </li>
                            {{-- <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
                            <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
                            <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> --}}
                        <li><a href="{{ route('Web.completedAssg')}}"><em class="fa fa-transgender">&nbsp;</em> Completed</a></li>
                        <li><a href="{{ route('Web.settings')}}"><em class="fa fa-cog">&nbsp;</em> Settings</a></li>

                        <li><a href="{{ route('Web.logout')}}"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
                        </ul>
                    </div>
                <!--/.sidebar-->
                @endif

            @endisset


                <main class="py-2">
                    @yield('content')
                </main>
                @component('utils.modal_wrapper', ["title"=>" Data "])

                @endcomponent


        </div>
        <!-- .container -->
    </div>
    <script src="{{ asset('assets/writersBay/js/jquery-1.11.1.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/bootstrap4/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('assets/writersBay/js/bootstrap.min.js') }}"></script>

    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <script src="{{ asset('assets/writersBay/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('assets/writersBay/DataTables4/datatables.min.js') }}"></script> --}}
     {{--<script src="{{ asset('assets/writersBay/js/bootstrap-datepicker.js') }}"></script>--}}
    <script src="{{ asset('assets/writersBay/js/chart.min.js') }}"></script>
	<script src="{{ asset('assets/writersBay/js/chart-data.js') }}"></script>
	<script src="{{ asset('assets/writersBay/js/easypiechart.js') }}"></script>
	{{--<script src="{{ asset('assets/writersBay/js/easypiechart-data.js') }}"></script>--}}
    <script>
            $(document).ready(function() {
                // $('#dataTables-example').DataTable({
                //         responsive: true
                // });
				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
				});

                $(".arriveOrders").on('click', function () {
                    window.location = '{{ route('Web.orders') }}'
                })


            });

        //    function ajax
        function sendFormData(url, postdata){
            $.ajax({
                url: url,
                data: postdata,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    alert("success Derivery");
                    setTimeout(function(){
                        location.reload();
                    }, 1500)
                },
                error: function (err) {
                    console.log(err);
                }
            })
        }



        </script>
    @yield('bottom-scripts')
</body>
</html>
{{--this website was made by Wainaina Nicholas Waruingi of Mombex Ent contact him through +254707722247 or email nickforbiz@gmail.com--}}
<!--this website was made by Wainaina Nicholas Waruingi of Mombex Ent contact him through +254707722247 or email nickforbiz@gmail.com-->