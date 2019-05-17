@extends('Admin.layouts.app')

@section('content')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row" style="margin-top:30px">
        <div class="col-md-12">
            <!-- Tables  -->
                        <div class="panel panel-default col-md-12">
                            <div class="panel-heading">
                                Available Writers
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>username</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile </th>
                                                <th>Roles </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach (App\Models\User::where('status', 1)->get() as $user)
										 <tr class="tb_data" data-id='1'>
											 <td> {{ $user->id }}</td>
											 <td> {{ $user->username }} </td>
											 <td> {{ $user->fname }} </td>
											 <td> {{ $user->lname }} </td>
											 <td> {{ $user->email }} </td>
											 <td> {{ $user->mobile }} </td>
											 <td> {{ $user->roles }} </td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
            <!-- Tables-->
        </div>
    </div>
</div>
@endsection
