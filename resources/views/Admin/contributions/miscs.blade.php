@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Miscalleneous </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Miscalleneous </h1>
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
                        <form id="misca-form">
                            <div class="form-group col-md-4">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="amount">Description:</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter description" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    @foreach(\App\Models\ContributionCategory::where('status', 1)->where('active', 1)->get() as $c_contribute)
                                        <option value="{{ $c_contribute->id }}"> {{ $c_contribute->name}} </option>
                                    @endforeach
                                </select>
                                @php($member_id = Auth::guard('web')->user()->id)
                                <input type="hidden" name="member_id"  value="{{ \App\Models\Member::where('user_id', $member_id)->first()->id }}" >

                            </div>
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
            $("#misca-form").on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route("Admin.miscContribution") }}',
                    data:$("#misca-form").serializeArray(),
                    method:'post',
                    success: function (d) {
                        if (d.code == 1){
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            $("#misca-form")[0].reset();
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