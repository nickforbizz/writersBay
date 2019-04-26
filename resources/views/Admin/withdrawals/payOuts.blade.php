@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | PayOuts </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PayOuts</h1>
            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        PayOuts Details
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
                                <td>Total Pay</td>
                                {{--<td>Action + </td>--}}
                                <td>Action  </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\NormalContribution::where('status', 1)
                                        ->where('active', 1)
                                        ->get() as $p_toPay)
                                <tr>
                                    <td>{{ $p_toPay->id }}</td>
                                    <td>{{ $p_toPay->contribution->member->user->username }}</td>
                                    <td>{{ $p_toPay->contribution->member->user->email }}</td>
                                    <td>{{ $p_toPay->contribution->amount }}</td>
                                    <td>{{ ($p_toPay->contribution->amount * $p_toPay->contribution->member->count()) }}</td>
                                    {{--<td>--}}
                                        {{--<button class="btn btn-primary">--}}
                                            {{--<a href="{{ route('Admin.deactivatePenalty', ['id'=>$p_toPay->id]) }}" style="color: white;">Deny</a>--}}
                                        {{--</button>--}}
                                    {{--</td>--}}
                                    <td class="t-edit"
                                        data-id="{{ $p_toPay->id }}"
                                        data-route="{{ route('Admin.payoutWithdrawal',
                                            ['id'=>$p_toPay->id,
                                              'amount'=>($p_toPay->contribution->amount * $p_toPay->contribution->member->count()),
                                              'member_id'=>$p_toPay->contribution->member->id
                                            ])  }}">
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