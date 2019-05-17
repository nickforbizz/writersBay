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
                   On Progress Assignments
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
                                    <th>Amount </th>
                                    <th>Date Posted </th>
                                    <th>Writer</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach (App\Models\Onprogressassignment::where('status', 1)
                                        ->where('active', 1)
                                        ->get() as $on_progress)
                            <tr class="tb_data" data-id='{{ $on_progress->id }}'>
                                 <td> {{ $on_progress->id }}</td>
                                 <td> {{ $on_progress->Assignment->title }} </td>
                                 <td> {{ $on_progress->Assignment->category }} </td>
                                 <td> {{ $on_progress->Assignment->pages }} </td>
                                 <td> {{ $on_progress->Assignment->amount }} </td>
                                 <td> {{ $on_progress->created_at->diffForHumans() }} </td>
                                 <td> {{ $on_progress->User->username }} </td>
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
