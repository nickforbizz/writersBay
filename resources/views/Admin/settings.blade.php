@extends('Admin.layouts.app')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="{{ route('Admin.home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                    <li class="active">Dashboard/Settings</li>
                </ol>
            </div>
            <!--/.row-->
        <div class="jumbotron">

            settings
        </div>
    </div>

@endsection

@section('bottom-scripts')

@endsection

