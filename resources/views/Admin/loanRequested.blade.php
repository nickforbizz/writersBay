@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Loan Requested </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loan Requested</h1>
            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Loan Requested Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>amount</td>
                                <td>Action + </td>
                                <td>Action - </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\LoanRequested::where('status', 1)
                                        ->where('active', 1)
                                        ->where('approve', 0)
                                        ->get() as $l_request)
                                <tr>
                                    <td>{{ $l_request->id }}</td>
                                    <td>{{ $l_request->member->user->username }}</td>
                                    <td>{{ $l_request->member->user->email }}</td>
                                    <td>{{ $l_request->amount }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivatePenalty', ['id'=>$l_request->id]) }}" style="color: white;">Deny</a>
                                        </button>
                                    </td>
                                    <td class="t-edit" data-id="{{ $l_request->id }}" data-route="{{ route('Admin.getpenaltiesCategory',['id'=>$l_request->id])  }}">
                                        <button class="btn btn-primary">
                                            Approve
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
    <script>
        $(document).ready(function () {

            // get update
            $(document).on("click",".t-edit", function () {
                id = $(this).attr("data-id");
                theRoute = $(this).attr("data-route");
                model = 'PenaltyCategory';
                getThePatch(theRoute, id, model)
            });

            // Update
            the_route = '{{ route('Admin.update_penaltiesCategory') }}';
            updateData(the_route);

        }); // doc.ready


    </script>
@endsection