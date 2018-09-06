@extends('layouts.app')

@section('title', 'Home')

@php
    $image = GetImage(GetSettings('header_image'), '/public/one/images/', '/one/images/');
@endphp

@section('style')

<style type="text/css">
    .banner { background: url({{ $image }}) no-repeat center; min-height: 500px; padding-bottom: 100px; width: 100%; background-size: cover; }
</style>

{{ Html::style('one/css/select2.css') }}
{{ Html::style('one/css/reset.css') }}
{{ Html::style('one/css/quick.css') }}
{{ Html::script('one/js/modernizr.js') }}
@endsection

@section('content')
    
    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                <h1>Welcome to {{ GetSettings('sitename') }}</h1>
                    @include('inc.search')
                <p class="lead">{{ GetSettings('discription') }}</p>
                <a class="banner_btn btn hvr-grow" href="{{ url('/user/create/building') }}">{{ __('Add Your Building From Here For Free !!') }}</a>
            </div>
        </div>
    </div>


    <section class="text-center" style="background-color: #47374e;">
        <ul class="cd-items cd-container">
            @foreach(\App\Buliding::status()->get() as $bu)
            <li class="cd-item hvr-grow">
                <img src="{{ SetImage($bu->bu_image, 'buildings') }}" alt="{{ $bu->bu_name }}" title="{{ $bu->bu_name }}">
                <a href="javascript:void(0);"  data-id="{{ $bu->id }}" class="cd-trigger">Quick View</a>
            </li>
            @endforeach
        </ul> 

        <div class="cd-quick-view">
            <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li><img style="width: 257px;" src="" class="buimage img-responsive" alt="Product 1"></li>
                </ul>
            </div> 

            <div class="cd-item-info" style="height: 258px;">
                <h2 class="buname"></h2>
                <h2 class="buprice"></h2>
                <p class="budis"></p>
                <ul class="cd-item-action">                 
                    <li><a class="buid">Learn more</a></li>    
                </ul>
            </div>
            <a href="javascript:void(0)" class="cd-close">Close</a>
        </div>
    </section>
    @include('inc.footer')
@stop

@section('script')

{{ Html::script('one/js/velocity.min.js') }}
{{ Html::script('one/js/main.js') }}

<script type="text/javascript">
    function rooturl() {
        return '{{ Request::root() }}';
    }
    function noimageurl() {
        return '{{ GetSettings('no_image') }}';
    }
</script>
@stop
