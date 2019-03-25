@extends('web.layoutsWeb.appWriter')

@section('content')


    <!-- ________________________Lumino________________________________________________________ -->


    <!-- body -sideNav and main -->


        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                    <li class="active">Writer_Portal/Revision</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="pull-right ">New Orders</div>
                    <h3 class="page-header">Assignments Under Revision:</h3>
                </div>
                <div class="col-12">
                    <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Order Title</th>
                                    <th>Deadline</th>
                                    <th>Category</th>
                                    <th>Pages </th>
                                    <th>Amount</th>
                                    <th>upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\OnrevisionAssignment::where('status', 1)
                                            ->where('active', 1)
                                            ->where('user_id', Auth::guard('web')->user()->id)
                                            ->get() as $on_revision)
                                <tr class="tb_data" data-id=' {{ $on_revision->id }}'>
                                    <td> {{ $on_revision->id }}</td>
                                    <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->title }} </td>
                                    <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->category }} </td>
                                    <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->pages }} </td>
                                    <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->amount }} </td>
                                    <td> {{ $on_revision->onreviewassignment->onprogressassignment->assignment->words }} </td>
                                    <td>
                                        <button class="btn btn-important btn-sm upload-order" data-id="{{ $on_revision->id }}">
                                            <a href="{{ route('Web.uploadAssg',['id'=>$on_revision->id]) }}">Upload</a>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
                </div>
            </div><!--/.row-->


        </div>
        <!--/.main-->
    <!-- ________________________Lumino ends____________________________________________________ -->

@endsection

@section('bottom-scripts')
    <script>
      $(document).ready(function () {
         // Take Order
         $(document).on("click",'.'+tag, function () {
                var order_id = $(this).attr("data-id");
                var writer_id = {{ Auth::guard('admin')->user()->id  }}
         });

    });

    function xg_data(tag) {
        $.ajax({
            url:'/web/takeOrder/' + order_id+'/'+writer_id,
            method: 'get',
            success: function (data) {
                // data = JSON.parse(data);
                console.log(data);


                $("#edit").html('');

                if (data.code == 1) {
                    $("#edit").html(`
                    @component('utils.successModal',["code"=>"Order Taken"])

                    @endcomponent
                    `)
                    location.reload();
                } else if(data.code == -1){
                    var errs = $.map(data.errs, function(value, index) {
                        return [value];
                    });
                    console.log("some");

                    $("#edit").html(`
                        @component('utils.errorsModal',["code"=>"-1"])

                        @endcomponent
                    `);
                    errs.forEach(element => {
                        $("#errors").append(`
                            @component('utils.errorsModalArray', ["code"=>"errorsArray"])

                            @endcomponent
                        `);
                    });
                }else {
                    $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                    $("#submit_btn").hide();
                }
                $("#myModal").modal();
            },
            error: function (err) {
                console.log(err);
                alert("Fatal Error Occurred");
                }
        })

    }
    </script>
@endsection
