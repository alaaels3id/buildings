@php
	$admin_image = SetImage($auth->user_image, 'users');
@endphp
<header class="main-header">
	
	<a href="{{ route('admin-panal') }}" class="logo">
		<span class="logo-mini"><b>A</b>DP</span>
		<span class="logo-lg"><b>Admin </b>Panal</span>
	</a>
	
	<nav class="navbar navbar-static-top">
		
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				
				<li class="dropdown messages-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope-o"></i>
						@if(getUnreadedMessagesCount() != 0)
							<span class="label label-success">{{ getUnreadedMessagesCount() }}</span>
						@else
							<span></span>
						@endif
					</a>
					
					<ul class="dropdown-menu">
						<li class="header">
							You have {{ getUnreadedMessagesCount() == 0 ? 'No Messages' : getUnreadedMessagesCount().' unreaded' }}
						</li>
						<li>
							<ul class="menu">
								@forelse(getUnreadedMessages() as $key => $value)
								@php
									$img = GetImage($value->image, '/public/one/uploads/users/', '/one/uploads/users/');
								@endphp
								<li>
									<a href="{{ url('admin-panal/contactus/'.$value->id.'/edit') }}">
										<div class="pull-left">
											<img src="{{ $img }}" class="img-circle" alt="User Image">
										</div>
										<h4>{{ ucfirst($value->co_name) }}<small><i class="fa fa-clock-o"></i> {{ $value->created_at->diffForHumans() }}</small></h4>
										<p><span><i class="label label-info"></i> Subject : {{ $value->co_subject }}</span><br>{{ str_limit($value->co_message, 20) }}</p>
									</a>
								</li>
								@empty
									<li class="text-center" style="padding:10px;">{{ __('NO Messages') }}</li>
								@endforelse
							</ul>
						</li>
						<li class="footer"><a href="{{ url('admin-panal/contactus') }}">See All Messages</a></li>
					</ul>
				</li>
				
				<li class="dropdown notifications-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i>
						<span class="label label-warning">{{ getBuildingsStatusCount('Disactive') }}</span>
					</a>
 
					<ul class="dropdown-menu">
						<li class="header">
							You have {{ getBuildingsStatusCount('Disactive') }} notifications
						</li>
						<li>
							<ul class="menu">
								@forelse(App\Buliding::where('bu_status', 'Disactive')->get() as $dis)
										<li>
											<div class="pull-left">
												<i class="fa fa-users text-red"></i>
												<a class="btn btn-default text-center" href="{{ url('/admin-panal/buildings/'.$dis->id.'/edit') }}">{{ $dis->bu_name }}</a>
											</div>
											<a class="pull-right btn text-center" href="{{ url('/admin-panal/ChangeStatus/'.$dis->id.'/Active') }}">Set Active</a>
											<div class="clearfix"></div>
										</li>
								@empty
									<li>{{ __('No Disactive Buildings Avilable Right Now !!') }}</li>
								@endforelse
							</ul>
						</li>
						<li class="footer"><a href="#">View all</a></li>
					</ul>
				</li>
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ $admin_image }}"  class="user-image" alt="IMG">
						<span class="hidden-xs">{{ $auth->name }}</span>
					</a>
					
					<ul class="dropdown-menu">
						
						<li class="user-header">
							<img src="{{ $admin_image }}" class="img-circle" alt="User Image">
							<p>{{ $auth->name }} - Web Developer<small>Member since Nov. {{ $auth->created_at->year }}</small></p>
						</li>
						
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center"><a href="#">Followers</a></div>
								<div class="col-xs-4 text-center"><a href="#">Sales</a></div>
								<div class="col-xs-4 text-center"><a href="#">Friends</a></div>
							</div>
						</li>
						
						<li class="user-footer">
							
							<div class="pull-left">
								<a href="{{ url('/admin-panal/profile/'.$auth->name) }}" class="btn btn-default btn-flat">Profile</a>
							</div>
							
							<div class="pull-right">
								<a class="btn btn-default btn-flat" href="{{ route('logout') }}"
	                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
	                               {{ __('Sign out') }}
	                            </a>
	                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
                            	</form>
	                        </div>
						</li>

					</ul>
				</li>
				
				<li><a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a></li>
			</ul>
		</div>
	</nav>
</header>