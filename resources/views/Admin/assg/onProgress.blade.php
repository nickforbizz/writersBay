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
                               Pending Payment Assignments
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Title</th>
                                                <th> Category</th>
                                                <th>Pages</th>
                                                <th>Amount paid</th>
                                                <th>Paid At </th>
                                                <th>Paid To </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach (App\Models\AssgPendingPayment::where('status', 1)->get() as $pending_pay)
										<tr class="tb_data" data-id='{{ $pending_pay->id }}'>
											 <td> {{ $pending_pay->id }}</td>
											 <td> {{ $pending_pay->Assignment->title }} </td>
											 <td> {{ $pending_pay->Assignment->category }} </td>
											 <td> {{ $pending_pay->Assignment->pages }} </td>
											 <td> {{ $pending_pay->amount_paid }} </td>
											 <td> {{ diffForHumans($pending_pay->created_at) }} </td>
											 <td> {{ $pending_pay->User->username }} </td>
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
