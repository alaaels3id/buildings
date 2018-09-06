@extends('layouts.app')

@section('title', 'Building Detiels')
@section('style')
    {{ Html::style('admin/cus/buildings.css') }}
    <style>
        .padding{margin: 10px;}
        .img-center{margin: 0px auto;}
    </style>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li class="active"><a href="{{ url($root) }}">{{ __('Home') }}</a></li>
                <li class="h4"><a href="{{ url($root.'/buildings/') }}">{{ __('Buildings') }}</a></li>
                <li class="h4">{{ $buildinfo->bu_name }}'s Page</li>
            </ol>
            <div class="row">
                <div class="col-md-5">
                    <ul class="unstyled-list">
                        <li class="list-group-item text-center">
                            <img src="{{ SetImage($buildinfo->bu_image, 'buildings') }}" class="thumbnail img-responsive img-center" alt="{{ $buildinfo->bu_name }}"/>
                        </li>
                        <li class="list-group-item text-center">
                            <p class="text-center lead text-justify">{{ $buildinfo->bu_small_dis }}</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item" style="background-color: #f5f5f5;padding: 20px;color: #000;">
                                    <h3 class="profile-username text-center">
                                        {{ ucfirst($buildinfo->bu_name) }}
                                    </h3>
                                </li>

                                <li class="list-group-item">
                                    <b>Name</b> <a class="pull-right">{{ ucfirst($buildinfo->bu_name) }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Price</b> <a class="pull-right">{{ GetMoney($buildinfo->bu_price) }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Rooms</b> <a class="pull-right">{{ $buildinfo->bu_rooms }} rooms</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Type</b> <a class="pull-right">{{ ucfirst($buildinfo->bu_type) }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Governmente</b> <a class="pull-right">{{ ucfirst($buildinfo->bu_gov) }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Rent</b> <a class="pull-right">{{ $buildinfo->bu_rent == 'Yes' ? 'For Rent' : 'For Buy'  }}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Square</b> <a class="pull-right">{{ $buildinfo->bu_square }} M</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Discription :</b>
                                    <p class="lead text-justify">
                                        {{ $buildinfo->bu_large_dis }}
                                    </p>
                                </li>
                            </ul> 
                            <a href="{{ route('makeorder', ['type' => $buildinfo->bu_rent, 'id' => $buildinfo->id]) }}" style="background-color: #2abb9b;color: #fff;" class="btn btn-lg btn-block">
                                <i class="fa fa-shopping-cart" style="color:white;"> </i> 
                                {{ $buildinfo->bu_rent == 'Yes' ? 'Rent Now!' : 'Buy Now!' }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-md-offset-1" style="padding: 15px;margin: 10px 0 10px 30px;">
                    <div id="map" style="width:100%;height:500px;"></div>

                    <script>
                    function myMap() {
                      var myCenter = new google.maps.LatLng({{ $buildinfo->bu_latitude }}, {{ $buildinfo->bu_langtude }});
                      var mapCanvas = document.getElementById("map");
                      var mapOptions = {center: myCenter, zoom: 5};
                      var map = new google.maps.Map(mapCanvas, mapOptions);
                      var marker = new google.maps.Marker({position:myCenter});
                      marker.setMap(map);
                    }
                    </script>

                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsv18sb5X3Ozzfac8DlkoPF9uU7tkXBio&callback=myMap"></script>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <hr>
                <hr>
                <h1>Realted</h1>
                @include('inc.buildings', ['buildings' => $recommed_rent])
                @include('inc.buildings', ['buildings' => $recommed_type])
            </div>
        </div>
    </div>
    @include('inc.footer')
@stop

