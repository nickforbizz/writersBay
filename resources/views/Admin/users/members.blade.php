@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Members </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Members</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row well">


                <form id="member-form" class="form">
                    <label for="chama">Select Chama</label>
                    <select id="chama" name="chama_id" class="form-control" required>
                        <option selected disabled>Select Chamaa</option>
                        @foreach(\App\Models\Chama::where('status', 1)->get() as $chama)
                            <option value="{{ $chama->id }}"> {{ $chama->name }} </option>
                        @endforeach
                    </select>
                    <br> <br>
                <div class="form-group col-md-4">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                </div>
                <div class="form-group col-md-4">
                    <label>Surname</label>
                    <input type="text" name="sname" class="form-control" placeholder="Enter Surname">
                </div>
                <div class="form-group col-md-4">
                    <label>National ID</label>
                    <input type="number" name="national_id" class="form-control" placeholder="Enter National ID">
                </div>
                <div class="form-group col-md-4">
                    <label>E-mail </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="form-group col-md-4">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="form-group col-md-4">
                    <label>Gender</label>
                    <div class="radio">
                        <select class="form-control"  name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label>Username </label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
                </div>
                {{--<div class="form-group col-md-4">--}}
                    {{--<label>Password</label>--}}
                    {{--<input type="password" name="password" class="form-control" placeholder="Enter Password">--}}
                {{--</div>--}}


                {{--<div class="form-group col-md-4">--}}
                    {{--<label>Password Confirmation</label>--}}
                    {{--<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password ">--}}
                {{--</div>--}}
                <div class="form-group col-md-12">
                    <div class="pull-right">
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div>
                <hr>
            </form>
        </div>

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
                                <td>Action</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Member::where('status', 1)->where('active', 1)->get() as $member)
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
                                            <a href="{{ route('Admin.editMember', ['id'=>$member->id]) }}" style="color: white;">Edit</a>
                                        </button>
                                    </td><td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivateMember', ['id'=>$member->id]) }}" style="color: white;">Deactivate</a>
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
        $("#member-form").on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url:'{{ route("Admin.addMember") }}',
                data:$("#member-form").serializeArray(),
                method:'post',
                success: function (d) {

                    if (d.code == 1){
                        $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                @endcomponent
                            `);
                        $("#member-form")[0].reset();
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