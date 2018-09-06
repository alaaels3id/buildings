@extends('layouts.app') 
@section('title', 'Add New Building') 
@section('style') {{ Html::style('admin/cus/buildings.css')
}} {{ Html::style('one/css/select2.min.css') }}
<style>
    .padding {
        margin: 10px;
    }
</style>
@endsection
 
@section('content')
<div class="container">
    <div class="row">

        <ol class="breadcrumb">
            <li class="active"><a href="{{ url($root) }}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li><a href="{{ url($root.'/buildings/') }}"><i class="fa fa-home"></i> {{ __('Buildings') }}</a></li>
            <li><a href="{{ url($root.'/user/create/building') }}"><i class="fa fa-home"></i> {{ __('Add new Building') }}</a></li>
        </ol>

        <div class="col-md-3">
    @include('inc.nav')
        </div>

        <div class="col-md-9">
            <div class="panel-heading">{{ __('Create a new Building') }}</div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="alert alert-success">
                        <p class="lead">
                            <b>Message !! </b><h3>{{ __('You have added a new Building Success') }} <i class="fa fa-true"></i></h3>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection