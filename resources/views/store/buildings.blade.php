@extends('layouts.app')

@section('title', 'Buildings')

@section('style')
	{{ Html::style('admin/cus/buildings.css') }}
	{{ Html::style('admin/dist/css/select2.css') }}
	<style>.padding{margin: 10px;}</style>
@stop

@section('content')	
	<div class="container">
		<div class="row">
			<ol class="breadcrumb">
                <li class="h4"><a href="{{ url('/') }}">{{ ('Home') }}</a></li>
                <li class="active">{{ ('Buildings') }}</li>
            </ol>
		</div>
		
		<div class="row">
			@include('admin.layout.message')
			
			<div class="col-md-4">@include('inc.nav')</div>
			
			<div class="col-md-8">
				<div class="row">
					@include('inc.buildings')
					<div class="text-center">
						{{ $buildings->appends(Request::except('page'))->render() }}
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('inc.footer')
@stop
