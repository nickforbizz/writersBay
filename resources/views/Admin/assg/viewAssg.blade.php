@extends('Admin.layouts.app')

@section('content')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('Admin.home') }}">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Dashboard/viewAssignments</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row" style="margin-top:30px">
        <div class="col-md-12">
            <!-- Tables  -->
                        <div class="panel panel-default col-md-12">
                            <div class="panel-heading">
                                All Assignments
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Pages</th>
                                                <th>Amount</th>
                                                <th>Uploaded By</th>
                                                <th>Date Posted</th>
                                                <th>Active </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach (App\Models\Assignment::where('status', 1)->get() as $assignment)
										 <tr class="tb_data" data-id='{{ $assignment->id }}'>
											 <td> {{ $assignment->id }}</td>
											 <td> {{ $assignment->title }} </td>
											 <td> {{ $assignment->category }} </td>
											 <td> {{ $assignment->pages }} </td>
											 <td> {{ $assignment->amount }} </td>
											 <td> {{ $assignment->admin()->username }} </td>
											 <td> {{ $assignment->created_at->diffForHumans() }} </td>
											 <td> {{ $assignment->status }} </td>
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
