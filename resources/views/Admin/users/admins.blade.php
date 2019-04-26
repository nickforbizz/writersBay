@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Admin </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Upgrade User To Admin
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
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Member::where('status', 1)->where('active', 1)->get() as $member_to_admin)
                                {{--{{ (\App\Models\Admin::where('email',$member_to_admin->user->email)->first() }}--}}
                                @php($t_id = $member_to_admin->user_id )

                                @php($user_id = \App\Models\Admin::where('user_id',$member_to_admin->user_id)->get())

                        {{ $user_id }}
                                {{--@if((\App\Models\Admin::where('user_id',$member_to_admin->user_id))--}}
                             {{--!= ($member_to_admin->user_id)--}}
                             {{--)--}}
                                <tr>
                                    <td>{{ $member_to_admin->id }}</td>
                                    <td>{{ $member_to_admin->user->fname }}</td>
                                    <td>{{ $member_to_admin->user->lname }}</td>
                                    <td>{{ $member_to_admin->user->username }}</td>
                                    <td>{{ $member_to_admin->user->email }}</td>
                                    <td>{{ $member_to_admin->user->phone_number }}</td>
                                    <td>{{ $member_to_admin->user->national_id }}</td>
                                   <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.memberToAdmin', ['id'=>$member_to_admin->id]) }}" style="color: white;">Upgrade</a>
                                        </button>
                                    </td>
                                </tr>
                                {{--@endif--}}
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



        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin Details
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
                                <td>Action</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Admin::where('status', 1)->where('active', 1)->get() as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->user->fname }}</td>
                                    <td>{{ $admin->user->lname }}</td>
                                    <td>{{ $admin->user->username }}</td>
                                    <td>{{ $admin->user->email }}</td>
                                    <td>{{ $admin->user->phone_number }}</td>
                                    <td>{{ $admin->user->national_id }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.editAdmin', ['id'=>$admin->id]) }}" style="color: white;">Edit</a>
                                        </button>
                                    </td><td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivateAdmin', ['id'=>$admin->id]) }}" style="color: white;">Deactivate</a>
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
        //  add details
        $("#admin-form").on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url:'{{ route("Admin.addMember") }}',
                data:$("#admin-form").serializeArray(),
                method:'post',
                success: function (d) {

                    if (d.code == 1){
                        $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                @endcomponent
                            `);
                        $("#admin-form")[0].reset();
                        $("#myModal").modal();

                    }else if(d.code == 3){
                        var errs = $.map(d.errs, function(value, index) {
                            return [value];
                        });
                        console.log(errs)
                        $(".edit").html(`
                                @component('Admin.utils.errorsModal',['code'=> 'errsD' ])

                                @endcomponent
                            `);
                        errs.forEach(element => {
                            $("#errors").append(`
                                    @component('Admin.utils.errs_modal', ["code"=>"errorsArray"])

                                    @endcomponent
                                `);
                        });
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
                    console.log(d.code);
                },error:function(err){
                    console.log(err);
                    alert("Fatal Error ");
                }
            })
        });


    </script>
@endsection