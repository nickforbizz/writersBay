@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Member Feedback </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Member Feedback </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Categories
                    </div>
                    <div class="panel-body">
                        <form id="suggest-form">
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


    </div>
    <!-- /.page-wraper -->
@endsection
@section('bottom-scripts')

    <script>
        $(document).ready(function () {
            //  add details
            $("#suggest-form").on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route("Admin.createUserSuggestion") }}',
                    data:$("#suggest-form").serializeArray(),
                    method:'post',
                    success: function (d) {
                        if (d.code == 1){
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            $("#suggest-form")[0].reset();
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

        })// doc.ready
    </script>

@endsection