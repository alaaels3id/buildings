@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')

<section class="content-header">
	<h1>Dashboard<small>Home</small></h1>
	<ol class="breadcrumb">
		<li class="active"><a href="{{ route('admin-panal') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="ion ion-ios-contact-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Users</span>
					<span class="info-box-number">{{ $UsersCount }}</span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="ion ion-ios-home"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Disactive Buildings</span>
					<span class="info-box-number">{{ getBuildingsStatusCount('Disactive') }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-blue"><i class="ion ion-ios-home"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">All Buildings</span>
					<span class="info-box-number">{{ getAllBuildingsCount() }}</span>
				</div>

			</div>
		</div>

		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="ion ion-ios-home-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Active Buildings</span>
					<span class="info-box-number">{{ getBuildingsStatusCount('Active') }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-purple"><i class="ion ion-chatbubbles"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">All Messages</span>
					<span class="info-box-number">{{ getAllMessagesCount() }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-navy"><i class="ion ion-chatbubbles"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">All Readed Messages</span>
					<span class="info-box-number">{{ getreadedMessagesCount() }}</span>
				</div>

			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="ion ion-ios-at-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">New Messages</span>
					<span class="info-box-number">{{ getUnreadedMessagesCount() }}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ ('تقرير المبيعات الشهري') }}</h3>

					<div class="box-tools pull-right">
						
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
						<div class="btn-group">
							
							<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-wrench"></i>
							</button>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/admin-panal/buildings/statistics') }}">الاحصائيات</a></li>
							</ul>

						</div>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center"><strong>Chart for Added Buildings</strong></p>
							<div class="chart"><canvas id="salesChart" style="height: 180px;"></canvas></div>
						</div>
					</div>
				</div>

				<div class="box-footer hidden-xs hidden-sm">
					<div class="row">
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
								<h5 class="description-header">$35,210.43</h5>
								<span class="description-text">TOTAL REVENUE</span>
							</div>

						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
								<h5 class="description-header">$10,390.90</h5>
								<span class="description-text">TOTAL COST</span>
							</div>

						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
								<h5 class="description-header">$24,813.53</h5>
								<span class="description-text">TOTAL PROFIT</span>
							</div>

						</div>

						<div class="col-sm-3 col-xs-6">
							<div class="description-block">
								<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
								<h5 class="description-header">1200</h5>
								<span class="description-text">GOAL COMPLETIONS</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Special Members</h3>

					<div class="box-tools pull-right">
						<span class="label label-danger">Special Users</span>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						@foreach($usersBuildingsCount as $usercount)
						<li>
							<a class="users-list-name" href="{{ route('users.edit', $usercount->id) }}" title="{{ $usercount->name }}">
								<img src="{{ SetImage($usercount->user_image, 'users') }}" alt="IMG">
							</a>
							<a class="users-list-name" href="{{ route('users.edit', $usercount->id) }}" title="{{ $usercount->name }}">
								{{ ucwords($usercount->name) }}
							</a>
							<span class="users-list-date">{{ $usercount->count }}</span>
						</li>
						@endforeach
					</ul>
				</div>

				<div class="box-footer text-center">
					<a href="{{ route('users.index') }}" class="uppercase">View All Users</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		
		<div class="col-md-8">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Buildings Charts</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				
				<div class="box-body no-padding">
					<div class="row">
						<div class="col-md-9 col-sm-8">
							<div class="pad">
								<div id="world-map-markers" style="height: 325px;"></div>
							</div>
						</div>

						<div class="col-md-3 col-sm-4">
							<div class="pad box-pane-right bg-green" style="min-height: 280px">
								<div class="description-block margin-bottom">
									<h5 class="description-header">{{ getBuildingsStatusCount('Active') }}</h5>
									<span class="description-text">Active Buildings</span>
								</div>
								<!-- /.description-block -->
								<div class="description-block margin-bottom">
									<h5 class="description-header">{{ getBuildingsStatusCount('Disactive') }}</h5>
									<span class="description-text">Disactive Buildings</span>
								</div>
								<!-- /.description-block -->
								<div class="description-block">
									<h5 class="description-header">{{ getBuildingsStatusCount('Active') + getBuildingsStatusCount('Disactive') }}</h5>
									<span class="description-text">Total Buildings</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Members</h3>

					<div class="box-tools pull-right">
						<span class="label label-danger">8 New Members</span>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body no-padding">
					<ul class="users-list clearfix">
						@foreach($leatestUsers as $last)
						@php $image = SetImage($last->user_image, 'users'); @endphp
						<li>
							<img src="{{ $image }}" alt="User Image">
							<a class="users-list-name" href="{{ route('users.edit', $last->id) }}" title="{{ $last->name }}">
								{{ $last->name }}
							</a>
							<span class="users-list-date">
								{{ \Carbon\Carbon::parse($last->created_at)->diffForHumans() }}
							</span>
						</li>
						@endforeach
					</ul>
				</div>

				<div class="box-footer text-center">
					<a href="{{ url('/admin-panal/users/') }}" class="uppercase">View All Users</a>
				</div>
			</div>
		</div>

	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Latest Buildings</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>

				<div class="box-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Building ID</th><th>Name</th><th>Price</th>
									<th>Sqaure</th><th>Type</th><th>Status</th><th>Rooms</th>
								</tr>
							</thead>
							<tbody>
								@foreach($leatestBuildings as $building)
								<tr>
									<td>{{ $building->id }}</td>
									<td>
										<a href="{{ url('/admin-panal/buildings/'.$building->id.'/edit') }}" title="{{ $building->bu_name }}">
											{{ $building->bu_name }}
										</a>
									</td>
									<td>{{ cknow\Money\Money::EGP($building->bu_price) }}</td>
									<td>{{ $building->bu_square }} M</td>
									<td>{{ $building->bu_type }}</td>
									<td>
										@if($building->bu_status == 'Active')
										<span class="label label-success">{{ $building->bu_status }}</span>
										@else
										<span class="label label-danger">{{ $building->bu_status }}</span>
										@endif
									</td>
									<td>{{ $building->bu_rooms }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="box-footer clearfix">
					<a href="{{ url('/admin-panal/buildings/create') }}" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
					<a href="{{ url('/admin-panal/buildings') }}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
				</div>
			</div>
		</div>
	</div>

</section>
@endsection
@section('script')
@include('admin.inc.chart')
@include('admin.inc.map')
@endsection