@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Activate </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Activate Users Members</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Members Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>National ID</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Member::where('status', 1)->where('active', 0)->get() as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->user->fname }}</td>
                                    <td>{{ $member->user->lname }}</td>
                                    <td>{{ $member->user->username }}</td>
                                    <td>{{ $member->user->email }}</td>
                                    <td>{{ $member->user->phone_number }}</td>
                                    <td>{{ $member->user->national_id }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.activateMember', ['id'=>$member->id]) }}" style="color: white;">Activate</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>




    </div>
    <!-- /.page-wraper -->
@endsection
@section('bottom-scripts')

@endsection