@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Assign Penalties </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Assign Penalties </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Notification Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Userame</td>
                                <td>email</td>
                                <td>Phone Number</td>
                                <td>National ID </td>
                                <td>status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Member::where('status', 1)->where('active', 1)->get() as $p_member)
                                <tr>
                                    <td>{{ $p_member->id }}</td>
                                    <td>{{ $p_member->user->username }}</td>
                                    <td>{{ $p_member->user->email }}</td>
                                    <td>{{ $p_member->user->phone_number }}</td>
                                    <td>{{ $p_member->user->national_id }}</td>

                                    <td class="t-edit" data-id="{{ $p_member->id }}" data-route="{{ route('Admin.getmember',['id'=>$p_member->id])  }}">
                                        <button class="btn btn-primary">
                                            penalise
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
            //  add details
            $("#notify-form").on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route("Admin.createNotification") }}',
                    data:$("#notify-form").serializeArray(),
                    method:'post',
                    success: function (d) {
                        if (d.code == 1){
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            $("#notify-form")[0].reset();
                            $("#myModal").modal();
                        }else if(d.code == 0){
                            // alert("no")
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'messageToShowloan'])
                                    @endcomponent
                                `);
                            $("#myModal").modal();
                        }else if(d.code == -1){
                            // alert("no")
                            $('.edit').html(`
                                @component('Admin.utils.errs_modal',['code'=>'w_errs'])
                                    @endcomponent
                                `);
                            $("#myModal").modal();
                        }else{
                            alert("Unknown Error")
                        }
                        console.log(d);
                    },error:function(err){
                        console.log(err);
                        alert("Fatal Error ");
                    }
                })
            });


            // get update
            $(document).on("click",".t-edit", function () {
                id = $(this).attr("data-id");
                theRoute = $(this).attr("data-route");
                model = 'Member';
                getThePatch(theRoute, id, model)
            });

            // Update
            the_route = '{{ route('Admin.memberPenalty') }}';
            updateData(the_route);

        })// doc.ready
    </script>

@endsection