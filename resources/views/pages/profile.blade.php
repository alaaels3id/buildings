@extends('layouts.pages')

@section('title', $auth->name.'\'s Profile')

@section('style') 
	{{ Html::style('admin/cus/buildings.css') }} 
	{{ Html::style('admin/dist/css/select2.css') }}
	<style>
		.main-color {background-color: #2abb9b;color: #fff;}
		.padding {margin: 10px;}
	</style>
@stop

@section('content')
	<section class="content-header">
		<h1>User Profile</h1>
		<ol class="breadcrumb">
			<li class="h4"><a href="{{ url($root) }}">Home</a></li>
			<li class="active h4">{{ $auth->name }}'s Profile</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-3">@include('user.sidebar')</div>
			<div class="col-md-9">
				@if(isset($mybuildings))
					@include('inc.buildings', ['buildings' => $mybuildings])
					{!! GetPaginate($mybuildings) !!}
				@endif
				
				@if(isset($userbu))
					@include('inc.buildings', ['buildings' => $userbu])
					{!! GetPaginate($userbu) !!}
				@endif

				@if(isset($orders))
					@include('inc.orders')
					{!! GetPaginate($orders) !!}
				@endif
			</div>
		</div>
	</section>
@stop
	