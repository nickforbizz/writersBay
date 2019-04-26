@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Loans  Application</title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Loans Application </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

            <!-- /.col-lg-12 -->

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Request Loan
                    </div>
                    <div class="panel-body">
                        <form id="loan-request">
                            <div class="form-group col-md-4">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    @foreach(\App\Models\WithdrawCategory::where('status', 1)->where('active', 1)->get() as $c_loan)
                                        <option value="{{ $c_loan->id }}">{{ $c_loan->name}}</option>
                                    @endforeach
                                </select>
                                {{--{{ Auth::guard('web')->user()->id }}--}}
                                @php($member_id = Auth::guard('web')->user()->id)


                                <input type="hidden" name="member_id"  value="{{ \App\Models\Member::where('user_id', $member_id)->first()->id }}" >

                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" class="form-control" placeholder="Enter Amount" required>
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
            $("#loan-request").on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route("Admin.requestLoan") }}',
                    data:$("#loan-request").serializeArray(),
                    method:'post',
                    success: function (d) {
                        if (d.code == 1){
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'loan-request'])
                                    @endcomponent
                                `);
                            $("#loan-request")[0].reset();
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