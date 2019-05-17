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
            <p class="lead"> Note that you are warned upon revision, This decreases your ratings</p>
        <!-- Tables  -->
            <div class="panel panel-default col-md-12">
                <div class="panel-heading">
                   Revision Assignments
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
                                    <th>Paid At </th>
                                    <th>Writer </th>
                                    <th>Warning</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach (App\Models\Onrevisionassignment::where('status', 1)->get() as $on_revision)
                            <tr class="tb_data" data-id='{{ $on_revision->id }}'>
                                 <td> {{ $on_revision->id }}</td>
                                 <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->title }} </td>
                                 <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->category }} </td>
                                 <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->pages }} </td>
                                 <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->amount }} </td>
                                 <td> {{ $on_revision->created_at->diffForHumans() }} </td>
                                 <td> {{ $on_revision->User->username }} </td>
                                 <td  class="bg-danger"> at level {{ $on_revision->warn }} </td>
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
