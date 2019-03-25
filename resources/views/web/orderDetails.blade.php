@extends('web.layoutsWeb.appWriter')

@section('content')
<div class="col-12 main">
    <div class="row">
        <div class="col-12" style="position: fixed;
        width: -webkit-fill-available;
        z-index: 22;">
            <div class="pull-right" style="margin: 20px;
            font-size: x-large;">
               <a href="{{ route('Web.home') }}">
                 <em class="fa fa-home">&nbsp;</em> Home
               </a>
            </div>
            <ol class="breadcrumb" style="font-size:30px">
                <li><a href="{{ route('Web.home') }}">
                    <em class="fa fa-refresh"></em>
                </a></li>
                <li class="active"><a href="{{ route('Web.orders') }}">Available Orders</a></li>
            </ol>
        </div>
    </div><!--/.row-->
     <br> <br>
    <div class="row">
        <div style="margin:40px"></div>
        <div class="col-md-10 col-md-offset-1">

            @foreach (App\Models\Assignment::where('active', 1)->get() as $order)

                <div class="panel panel-default" style="background-color:#b9c4c8">
                    <div class="panel-heading" style="background-color:#d3e1db">
                        <div class="pull-right">
                            <h6>Deadline <p style="font-size: 15px">{{ $order->deadline}} </p></h6>

                        </div>
                        <h4> <b>Title</b> {{ $order->title }}</h4>
                    </div>
                    <div class="panel-body" style="padding:0px 10px 5px 15px !important;">
                        <h4> <u>Description</u> </h4>
                        <p class="">{{ $order->description }}</p>
                        <div class="row">
                        <div class="col-12">
                            <div class="pull-right" style="margin-right:20px;">
                            <button class="btn btn-success take-order" data-id="{{ $order->id }}">Take</button>
                            </div>
                            <div class="pull-left" style="margin-left:10px;">
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#order-more{{ $order->id }}">more</button>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="order-more{{ $order->id }}" class="collapse" style="padding:30px 20px 5px 15px !important;">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

</div>
@endsection

@section('bottom-scripts')
    <script>

    $(document).ready(function () {
         // Take Order
         $(document).on("click",".take-order", function () {
                var order_id = $(this).attr("data-id");
                var writer_id = {{ Auth::guard('web')->user()->id  }}
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
            });
         //.take-order
    });

    </script>
@endsection
