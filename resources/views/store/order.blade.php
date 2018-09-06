@extends('layouts.app')

@section('title', 'Make Order')

@section('content')
<div class="container">
	<div class="row">
		<div class="row">
			<div class="col-md-6">
				<h3 style="width: 100%;background-color: #ddd;color: #000;border-radius: 15px;padding: 20px;">
					Your Order Information
				</h3>
				<form action="{{ route('rent') }}" method="POST">
					@csrf
					<div class="form-group">
						<label for="custumer_name" class="h4">Enter you Full Name</label>
						<input type="text" required="" id="custumer_name" class="form-control input-lg" autocomplete="off" name="custumer_name" value="">
					</div>
					<div class="form-group">
						<label for="custumer_email" class="h4">Enter your email</label>
						<input type="email" required="" class="form-control input-lg" name="custumer_email" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="custumer_tel" class="h4">Enter your Mobile</label>
						<input type="tel" required="" class="form-control input-lg" name="custumer_tel" autocomplete="off">
					</div>
					<div class="form-group">
						{{ Form::submit('Make Order', ['class' => 'btn btn-block btn-lg', 'style' => 'background-color: #2abb9b;color: #fff;']) }}
					</div>
					<input type="hidden" name="bu_id" value="{{ $buildinfo->id }}">
					<input type="hidden" name="user_id" value="{{ $auth->id }}">
					<input type="hidden" name="bu_rent" value="{{ $type }}">
				</form>
			</div>
			<div class="col-md-6">
				<h3 style="width: 100%;background-color: #ddd;color: #000;border-radius: 15px;padding: 20px;">Your Order</h3>
				<ul style="padding-top: 40px;" class="list-group">
					<li class="list-group-item">
						<b>Name</b> <a class="pull-right">{{ ucfirst($buildinfo->bu_name) }}</a>
					</li>

					<li class="list-group-item">
						<b>Price</b> <a class="pull-right">{{ cknow\Money\Money::EGP($buildinfo->bu_price) }}</a>
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
			</div>
		</div>
	</div>
</div>
@include('inc.footer')
@stop

