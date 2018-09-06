@extends('layouts.pages')

@section('title', 'Add New Building')

@section('style')
    {{ Html::style('admin/cus/buildings.css') }}
    {{ Html::style('one/css/select2.min.css') }}
    <style>
        .padding {
            margin: 10px;
        }
    </style>
@stop 

@section('content')
    <div class="row">

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url($root) }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ url($root.'/buildings/') }}">{{ __('Buildings') }}</a></li>
                    <li><a href="{{ url($root.'/profile/'.$auth->name) }}">{{ __('Profile') }}</a></li>
                    <li class="active">{{ __('Add new Building') }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">@include('inc.nav')</div>
        
            <div class="col-md-8">
                @include('admin.layout.message')
                <div class="panel panel-default">
                    <div class="panel-heading">{{ ('Create a new Building') }}</div>
                    <div class="panel-body text-center">
                        {!! Form::open(['url' => '/user/create/building', 'method' => 'POST', 'files' => true]) !!}
                        @include('admin.buildings.form')
                    
                        <div class="form-group">
                            <button style="padding: 10px;width:120px;" type="submit" class="btn banner_btn">
                                <i style="color: #fff;" class="fa fa-plus fa-1x"> </i> {{ ('Add') }}
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop