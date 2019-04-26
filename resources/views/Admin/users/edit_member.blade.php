@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Edit Member </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Member</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row well">

                    <form id="edit-member" class="form">
                        @php($e_member = \App\Models\Member::find($id)->first())
                        {{--{{ $e_member = \App\Models\Member::find($id)->first() }}--}}
                        <div class="form-group col-md-4">
                            <input type="hidden" name="member_id" value="{{ $id }}">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="{{ $e_member->user->fname }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="{{ $e_member->user->lname }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control" value="{{ $e_member->user->sname }} ">
                        </div>
                        <div class="form-group col-md-4">
                            <label>National ID</label>
                            <input type="number" name="national_id" class="form-control" value="{{ $e_member->user->national_id }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>E-mail </label>
                            <input type="email" name="email" class="form-control" value="{{ $e_member->user->email }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number" class="form-control" value="{{ $e_member->user->phone_number }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Gender</label>
                            <div class="radio">
                                <select class="form-control"  name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Username </label>
                            <input type="text" name="username" class="form-control" value="{{ $e_member->user->username }}">
                        </div>

                        <div class="form-group col-md-12">
                            <div class="pull-right">
                                <input type="submit" class="form-control btn btn-primary">
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.page-wraper -->
@endsection
@section('bottom-scripts')
    <script>

        // Update
            $("#edit-member").on("submit", function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route("Admin.update_member") }}',
                    method: 'post',
                    data: $("#edit-member").serializeArray(),
                    success: function (data) {
                        console.log(data);
                        if (data.code == 1) {
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            // thenReload();

                        } else {
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'errs'])
                                    @endcomponent
                                `);
                        }
                        $("#myModal").modal();


                    },error: function (data) {
                        $(".edit").html(`<div class="text-center"> <h3>Fatal Error While Updating...</h3> <p>Bye</p></div>`);
                        $("#myModal").modal();

                        console.log(data);

                    }
                })
            })



    </script>
@endsection