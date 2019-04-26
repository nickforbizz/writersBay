<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    @yield('page-title')


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/chama_dashboard/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/chama_dashboard/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('assets/chama_dashboard/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/chama_dashboard/css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('assets/chama_dashboard/css/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/chama_dashboard/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('top-styles')
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('Admin.dashboard') }}">Chamaa</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="{{ route('Admin.dashboard') }}"><i class="fa fa-home fa-fw"></i> Home</a></li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="{{ route('Admin.chamaaNotification') }}">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('Admin.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <div class="" style="text-transform: capitalize;align:center">
                            <h4 class="text-primary text-center">
                            {{ Auth::guard('web')->user()->username }}
                            </h4>
                            <span class="bg-info" style="padding: 10px;border-radius: 30px;">Online</span>

                            </div>


                        </div>
                        <!-- /input-group -->
                    </li>


                    <li>
                        <a href="{{ route('Admin.dashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('Admin.chamaMember') }}">Members</a>
                            </li><li>
                                <a href="{{ route('Admin.activateMembers') }}">Activate Members</a>
                            </li>
                            <li>
                                <a href="{{ route('Admin.admin') }}">Admins</a>
                            </li><li>
                                <a href="{{ route('Admin.activateAdmins') }}">Activate Admin</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Contributions<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('Admin.contributionCategory') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('Admin.basicPay') }}">Basic Pay</a>
                            </li>
                            <li>
                                <a href="{{ route('Admin.miscalleneous') }}">Miscalleneous</a>
                            </li>
                            <li>
                                <a href="{{ route('Admin.saving') }}">Savings</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Withdrawals<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('Admin.withdrawalCategory') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('Admin.payout') }}"> PayOuts</a>
                            </li>
                            <li>
                                <a href="{{ route('Admin.loan') }}">Loans</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Penalties<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('Admin.chamaaPenalty') }}"> Categories</a>

                            </li>
                            <li>
                                <a href="{{ route('Admin.AssgPenalty') }}"> Assign Penalties</a>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('Admin.loanRequest') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Loan Requested</a>
                    </li>
                    <li>
                        <a href="{{ route('Admin.chamaaNotification') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Notifications</a>
                    </li>
                    <li>
                        <a href="{{ route('Admin.suggestion') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Suggestions</a>
                    </li>

                    <li>
                        <a href="{{ route('Admin.logout') }}" class="active"><i class="fa fa-dashboard fa-fw"></i> logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>

        @component('Admin.utils.modal_default', ['title'=>'Additional Data About The Item'])
        @endcomponent

    </div>

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('assets/chama_dashboard/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/chama_dashboard/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/chama_dashboard/js/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('assets/chama_dashboard/js/raphael.min.js') }}"></script>
    {{--<script src="{{ asset('assets/chama_dashboard/js/morris.min.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/chama_dashboard/js/morris-data.js') }}"></script>--}}

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/chama_dashboard/js/startmin.js') }}"></script>
    <script !src="">

        function getThePatch(theRoute, id, model) {
            $.ajax({
                url: theRoute,
                method: 'get',
                success: function (data) {
                    console.log(data);
                    if( data.code == 1 && data.model == model){
                        if (model == 'Member'){
                            $(".edit").html(`
                            @component('admin.utils.modal_data',["code"=>"Member"])

                                    @endcomponent
                                `);
                        }else if(model == 'PenaltyCategory'){
                            $(".edit").html(`
                            @component('admin.utils.modal_data',["code"=>"PenaltyCategory"])

                                    @endcomponent
                                `);
                        }
                        else{
                            $(".edit").html(`
                            @component('admin.utils.modal_data',["code"=>"WithdrawCategory"])

                             @endcomponent
                              `);

                        }
                    } else if(data.code == -1){
                        $(".edit").html(`
                        @component('admin.utils.modal_data',["code"=>"errs"])

                                @endcomponent
                            `);
                    }else if(data.code == 2){
                        $(".edit").html(`
                        @component('admin.utils.modal_data',["code"=>"success"])

                                @endcomponent
                            `);
                    }
                    // $(".edit").html('');



                    $("#myModal").modal();
                },
                error: function (err) {console.log(err); alert("fatal Error")}
            })
        }


        function updateData(the_route) {
            $("#update").on("submit", function (event) {
                event.preventDefault();
                $.ajax({
                    url:the_route,
                    method: 'post',
                    data: $("#update").serializeArray(),
                    success: function (data) {
                        console.log(data);
                        if (data.code == 1) {
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            // thenReload();

                        } else {
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'errs'])
                                    @endcomponent
                                `);
                        }
                        $("#myModal").modal();


                    },error: function (data) {
                        $(".edit").html(`<div class="text-center"> <h3>Fatal Error While Updating...</h3> <p>Bye</p></div>`);
                        $("#myModal").modal();

                        console.log(data);

                    }
                })
            })

        }


        function thenReload() {
            setTimeout(function () {
                location.reload();
                // alert("lllllllllll")
            }, 1500)
        }

    </script>

    @yield('bottom-scripts')

</body>
</html>