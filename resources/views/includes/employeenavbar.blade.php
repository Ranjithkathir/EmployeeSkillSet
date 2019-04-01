<div class="navigationbar">
	<nav class="nav nav-navbar">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" id="webname" href="{{URL::asset('employee/Home')}}">Employee Skill Management</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="{{ Request::is('employee/Home') ? 'active' : '' }}"><a href="{{ url::asset('employee/Home') }}">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

						{{ Auth::guard('employee')->user()->Name }} <span class="caret"></span></a>

						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/employee/changepassword') }}"><span class="glyphicon glyphicon-pencil"></span> Change Password</a></li>
							<li><a href="{{ url('/employee/logout') }}"><span class="glyphicon glyphicon-log-out"></span> logout </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>