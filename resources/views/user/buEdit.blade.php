@extends('layouts.pages')

@section('title', $auth->username.'\'s Profile')

@section('style')
	{{ Html::style('admin/cus/buildings.css') }}
	{{ Html::style('admin/dist/css/select2.css') }}
	<style>.padding {margin: 10px;}</style>
@stop

@section('content')
	<div class="content-wrapper">
		
		<section class="content-header">
			<h1>Edit My Building <small>({{ $build->bu_name }})</small></h1>
			<ol class="breadcrumb">
				<li class="h4"><a href="{{ url('/') }}">Home</a></li>
				<li class="h4"><a href="{{ route('buildings') }}">Buildings</a></li>
				<li class="h4"><a href="{{ route('build', $build->id) }}">{{ ucfirst($build->bu_name) }} Page</a></li>
				<li class="active h4">Edit {{ ucfirst($build->bu_name) }}</li>
			</ol>
		</section>
		
		<section class="content">
			<div class="row">
				<div class="col-md-3">@include('user.sidebar')</div>
				<div class="col-md-9">
		            @include('admin.layout.message')
		            <div class="panel panel-default">
		            	<div class="panel-heading">{{ __('Edit My Building Information') }}</div>
		                <div class="panel-body text-center" style="padding:30px;">
		                    <br/>
		                    {!! Form::model($build, ['url' => '/user/update/building', 'method' => 'PATCH', 'files' => true]) !!}
		                    <input type="hidden" name="id" value="{{ $build->id }}">
		                        
		                    @include('admin.buildings.form')
		                    
	                        <div class="form-group mb-0">
                                <button type="submit" style="padding: 9px;font-size: 30px;" class="btn banner_btn btn-block">
                                    <i style="color: #fff;" class="fa fa-edit fa-1x"> </i> 
                                	{{ __('Update') }}
                                </button>
	                        </div>
		                    {!! Form::close() !!}
		                </div>
		            </div>
		        </div>
			</div>
		</section>
	</div>
@stop