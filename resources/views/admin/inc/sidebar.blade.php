<aside class="main-sidebar">

	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ GetImage($auth->user_image, '/public/one/uploads/users/', '/one/uploads/users/') }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ $auth->name }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>

		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			
			<li><a href="{{ url($root.'/admin-panal/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i> <span>Users</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="/admin-panal/users/create"><i class="fa fa-circle-o"></i>Add New User</a></li>
					<li><a href="/admin-panal/users"><i class="fa fa-circle-o"></i> Display All Users</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-address-book"></i> <span>Contacts</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="/admin-panal/contactus"><i class="fa fa-circle-o"></i> Display All Contacts</a></li>
				</ul>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-university" aria-hidden="true"></i> <span>Buildings</span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('buildings.create') }}"><i class="fa fa-circle-o"></i>Add New Building</a></li>
					<li><a href="/admin-panal/buildings"><i class="fa fa-circle-o"></i> Display All Buildings</a></li>
					<li><a href="{{ route('buildings.trash') }}"><i class="fa fa-circle-o"></i> Deleted Buildings</a></li>
				</ul>
			</li>
			
			<li><a href="{{ url('/admin-panal/settings/') }}"><i class="fa fa-gear"></i> <span>Settings</span></a></li>
			<li><a href="{{ url($root) }}" target="_blanck"><i class="fa fa-bug"></i> <span>Website</span></a></li>
			<li><a href="{{ url($root.'/admin-panal/buildings/statistics') }}"><i class="fa fa-bar-chart"></i> <span>Statistics</span></a></li>
		</ul>
	</section>
</aside>