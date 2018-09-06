<div class="box box-primary">
	<div class="box-body box-profile">
		<img class="profile-user-img img-responsive img-circle" src="{{ SetImage($auth->user_image, 'users') }}" alt="User profile picture">
		<br>							
		<h3 class="profile-username text-center">{{ ucwords($auth->username) }}</h3>
		
		<p class="text-muted text-center">Software Engineer</p>
		<br>
		
		<ul class="list-group list-group-unbordered">
			<h3 class="list-group-item text-center" style="background-color: #2ABB9B;color: #fff;">General</h3>
			<li class="list-group-item">
				<b>Buildings</b>
				<span class="pull-right"><a>{{ getUserBuildingsCount($auth->id, 'buliding_user', 'user_id') }}</a></span>
			</li>
			<li class="list-group-item">
				<b>Active Buildings</b>
				<span class="pull-right"><a>{{ getUserBuildingsStatusCount($auth->id, 'Active') }}</a></span>
			</li>
			<li class="list-group-item">
				<b>Disactive Buildings</b>
				<span class="pull-right"><a>{{ getUserBuildingsStatusCount($auth->id, 'Disactive') }}</a></span>
			</li>
			<li class="list-group-item">
				<b>Orders</b>
				<span class="pull-right"><a>{{ MyOrders($auth->id) }}</a></span>
			</li>
		</ul>

		<ul class="list-group list-group-unbordered">
			<h3 class="list-group-item text-center" style="background-color: #2ABB9B;color: #fff;">Actions</h3>
			<li class="list-group-item">
				<a>{{ getUserBuildingsCount($auth->id, 'buliding_user', 'user_id') }}</a>
				<a href="{{ url('user/create/building') }}" class="{{ SetActive('user/create/building') }}">
					<span style="color: #fff;" class="fa fa-plus pull-left"></span>{{ __('Add a Building') }}
				</a>
			</li>
			<li class="list-group-item">
				<b>Active Buildings</b>
				<span class="pull-right"><a>{{ getUserBuildingsStatusCount($auth->id, 'Active') }}</a></span>
			</li>
			<li class="list-group-item">
				<b>Disactive Buildings</b>
				<span class="pull-right"><a>{{ getUserBuildingsStatusCount($auth->id, 'Disactive') }}</a></span>
			</li>
			<li class="list-group-item">
				<b>Orders</b>
				<span class="pull-right"><a>{{ MyOrders($auth->id) }}</a></span>
			</li>
		</ul>

		<ul class="list-group">
			<li style="background-color: #2ABB9B;color: #fff;" class="list-group-item">
				<h3>Actions</h3>
			<li>
			<li class="list-group-item">
				
			<li>
			<li class="list-group-item">
				<a href="{{ url($root.'/profile/'.$auth->username.'/disactive') }}" class="{{ SetActive('profile/'.$auth->username.'/disactive') }}">
					<i style="color: #fff;" class="fa fa-bank pull-left"></i>{{ __('My Disactive Buildings') }}
				</a>
			<li>
			<li class="list-group-item">
				<a href="{{ url($root.'/profile/'.$auth->username.'/active') }}" class="{{ SetActive('profile/'.$auth->username.'/active') }}">
					<i style="color: #fff;" class="fa fa-home pull-left"></i>{{ __('My Active Buildings') }}
				</a>
			<li>
			<li class="list-group-item">
				<a href="{{ url($root.'/profile/'.$auth->username.'/orders') }}" class="{{ SetActive('profile/'.$auth->username.'/orders') }}">
					<i style="color: #fff;" class="fa fa-home pull-left"></i>{{ __('My Orders') }}
				</a>
			<li>
			<li class="list-group-item">
				<a href="{{ url($root.'/profile/'.$auth->username.'/edit') }}" class="{{ SetActive('profile/'.$auth->username.'/edit') }}">
					<i style="color: #fff;" class="fa fa-edit pull-left"></i>{{ __('Edit Profile') }}
				</a>
			</li>
		</ul>	

	</div>
</div>
<br/>
<div class="panel panel-default" style="padding:10px;border-radius:2%;">
	<div class="panel-header with-border"><h3 class="panal-title">About Me</h3></div>
	<div class="panel-body">		
		<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
		<p class="text-muted">{{ ucwords($auth->location) }}</p>
	</div>
</div>