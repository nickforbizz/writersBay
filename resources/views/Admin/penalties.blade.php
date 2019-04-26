@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Penalty Category </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Penalty Category</h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Categories
                    </div>
                    <div class="panel-body">
                        <form id="penalty-form">
                            <div class="form-group col-md-4">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount">Amount:</label>
                                <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount">Description:</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter description" required>
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


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Penalty Category Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Amount</td>
                                <td>Description</td>
                                <td>Action</td>
                                <td>status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\PenaltyCategory::where('status', 1)->where('active', 1)->get() as $penaa)
                                <tr>
                                    <td>{{ $penaa->id }}</td>
                                    <td>{{ $penaa->name }}</td>
                                    <td>{{ $penaa->amount }}</td>
                                    <td>{{ $penaa->description }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivatePenalty', ['id'=>$penaa->id]) }}" style="color: white;">Deactivate</a>
                                        </button>
                                    </td>
                                    <td class="t-edit" data-id="{{ $penaa->id }}" data-route="{{ route('Admin.getpenaltiesCategory',['id'=>$penaa->id])  }}">
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
            $("#penalty-form").on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route('Admin.penaltiesCategory') }}',
                    data:$("#penalty-form").serializeArray(),
                    method:'post',
                    success: function (d) {
                        if (d.code == 1){
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            $("#penalty-form")[0].reset();
                            $("#myModal").modal();


                        }else if(d.code == -1){
                            alert("no")
                            $('.edit').html(`
                                @component('Admin.utils.errs_modal',['code'=>'errs'])
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
                model = 'PenaltyCategory';
                getThePatch(theRoute, id, model)
            });

            // Update
            the_route = '{{ route('Admin.update_penaltiesCategory') }}';
            updateData(the_route);

        }); // doc.ready

    </script>
@endsection