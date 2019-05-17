@extends('web.layoutsWeb.appWriter')
@section('top-styles')
    <style>
        .allOrder{
            display: flex;
            background-color: #f5f4f1;
            padding: 15px;
        }
        .mainOrder{
            flex: 4;
            order: 2;
            padding: 0 15px 0 15px;
        }
        .orderSide1{
            flex: 1;
            order: 1;
            padding: 0 15px 0 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
        .orderSide2{
            flex: 2;
            order: 3;
            padding: 0 0 0 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);


        }
        .ddoc{
            float: right;
            padding: 7px;
            background-color: antiquewhite;
            color: black;
        }.md{
            margin-bottom: 10px;
         }
    </style>
    @endsection

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
    <div class="row container-fluid">
        <div style="margin:40px"></div>
        <div class="allOrder">
        <div class="mainOrder ">
            <h3> Order Details</h3>
            <hr>


            <div>
                <h4><b>Title</b></h4>
                {{ $order->title }}
            </div>

            <div>
                <h4><b>Description</b> </h4>
                {{ $order->description }}
            </div>


            <div>
            <h4><b>Medias</b></h4>

            @php( $idd = \App\Models\MediaFilesAssg::where('assg_id',$order->id)->where('status', 1)->get())
            @if( !$idd->isEmpty())
                <ul class="list-group">
                @foreach(\App\Models\MediaFilesAssg::where('assg_id',$order->id)->where('status', 1)->get() as $media)
                    <div class="md">
                        <li class="list-group-item">{{ $media->name }} <span class="badge ddoc"> <a href="">Download</a> </span></li>
                        <li class="list-group-item">Type<span class="badge"> {{ $media->type }} </span></li>
                    </div>
                @endforeach
                </ul>
            @else
            <p class="lead">No Media for this Order</p>
            @endif
            </div>
        </div>
         {{--<div class="orderSide1">--}}
             {{--<h3>side 1</h3>--}}
             {{--<p>--}}
                 {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse illum sapiente veritatis.--}}
                 {{--Aliquid aperiam dolorem, dolores doloribus est illum itaque, minima nisi perferendis quidem quos sequi,--}}
                 {{--soluta tempore tenetur veniam!--}}
             {{--</p>--}}
        {{--</div>--}}
        <div class="orderSide2">
            <h3>Additional Details</h3>
            <hr>


            <div>
                <h5><b>Required Pages</b></h5>
                {{ $order->pages }}
            </div>

            <div>
                <h5><b>Amount</b></h5>
                {{ $order->amount }}
            </div>


            <div>
            <h5><b>Date Posted</b></h5>
            {{ $order->created_at->diffForHumans() }}
            </div>


            <div>
            <h5><b>Deadline</b></h5>
            {{ $order->deadline }}
            </div>


            <div style="margin-bottom: 70px">



                @if(\App\Models\Onprogressassignment::where('status',1)->where('active', 1)->count() > 3)

                    <hr>
                <div class="pull-right" style="margin-right:20px;">

                <button class="btn btn-success take-order" disabled data-id="{{ $order->id }}">Take</button>

                </div>
                <p class="">Finish the assignment on progress first</p>

                @else
                    <div class="pull-right" style="margin-right:20px;">

                        <button class="btn btn-success take-order"  data-id="{{ $order->id }}">Take</button>

                    </div>
                @endif

            </div>
        </div>
        </div>
        <div class="col-md-10 col-md-offset-1">


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
                            // location.reload();
                            window.location('web/order')
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
