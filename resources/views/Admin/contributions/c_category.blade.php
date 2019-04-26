@extends('Admin.layouts.app')

@section('page-title')
    <title> chamaa | Contribution Category </title>
@endsection
@section('top-styles')

@endsection
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contribution Category</h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Categories
                    </div>
                    <div class="panel-body">
                        <form id="cCateg">
                            <div class="form-group col-md-4">
                                <label for="amount">Name:</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
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
                        Contribution Category Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Action</td>
                                <td>status</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\ContributionCategory::where('status', 1)->where('active', 1)->get() as $c_categ)
                                <tr>
                                    <td>{{ $c_categ->id }}</td>
                                    <td>{{ $c_categ->name }}</td>
                                    <td>{{ $c_categ->description }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('Admin.deactivateCcateg', ['id'=>$c_categ->id]) }}" style="color: white;">Deactivate</a>
                                        </button>
                                    </td>
                                    <td class="t-edit" data-id="{{ $c_categ->id }}" data-route="{{ route('Admin.getcontributionsCategory',['id'=>$c_categ->id])  }}">
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
            $("#cCateg").on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url:'{{ route('Admin.contributionsCategory') }}',
                    data:$("#cCateg").serializeArray(),
                    method:'post',
                    success: function (d) {
                        if (d.code == 1){
                            $('.edit').html(`
                                @component('Admin.utils.modal_data',['code'=>'success'])
                                    @endcomponent
                                `);
                            $("#cCateg")[0].reset();
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
                model = 'ContributionCategory';
                getThePatch(theRoute, id, model)
            });

            // Update
            the_route = '{{ route('Admin.update_contributionsCategory') }}';
            updateData(the_route);

        }); // doc.ready


    </script>
@endsection