@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Notifications </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Notifications </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Notifications
                    </div>
                    <div class="panel-body">
                        <form id="notify-form">
                            <div class="form-group col-md-4">
                                <label for="name">Title:</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            </div>
                            <div class="form-group col-md-10">
                                <label for="desc">Description:</label>
                                <textarea name="description" class="form-control" id="desc" cols="30" rows="10" required>Sample description</textarea>
                            </div>
                            @php($member_id = Auth::guard('web')->user()->id)
                            <input type="hidden" name="member_id"  value="{{ \App\Models\Member::where('user_id', $member_id)->first()->id }}" >

                            <div class="form-group col-md-12">
                                <div class="pull-rightd">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>


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
                                <td>Name</td>
                                <td>Description</td>
                                <td>Action +</td>
                                <td>Action - </td>
                                <td>status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\ChamaNotification::where('status', 1)->where('active', 1)->get() as $notify)
                                <tr>
                                    <td>{{ $notify->id }}</td>
                                    <td>{{ $notify->name }}</td>
                                    <td>{{ $notify->description }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivatePenalty', ['id'=>$notify->id]) }}" style="color: white;">Send To Members</a>
                                        </button>
                                    </td><td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivateNotification', ['id'=>$notify->id]) }}" style="color: white;">Deactivate</a>
                                        </button>
                                    </td>
                                    <td class="t-edit" data-id="{{ $notify->id }}" data-route="{{ route('Admin.getNotification',['id'=>$notify->id])  }}">
                                        <button class="btn btn-primary">
                                            Edit
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
                model = 'ChamaNotification';
                getThePatch(theRoute, id, model)
            });

            // Update
            the_route = '{{ route('Admin.updateNotification') }}';
            updateData(the_route);

        })// doc.ready
    </script>

@endsection