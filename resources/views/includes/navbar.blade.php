<div class="navigationbar">
    <nav class="nav nav-navbar">
        <div class="container">
        	<div class="navbar-header">
      			<a class="navbar-brand" id="webname" href="{{URL::asset('/Home')}}">Employee Skill Management</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('Home') ? 'active' : '' }}"><a href="{{ url::asset('Home') }}">Home</a></li>
                    <li class="{{ Request::is('Employees') ? 'active' : '' }}"><a href="{{ URL::asset('Employees') }}">Employee</a></li>
                    <li class="{{ Request::is('Skills') ? 'active' : '' }}"><a href="{{ URL::asset('Skills') }}">Skills</a></li>
                    <li class="{{ Route::is('profile') ? 'active' : '' }}"><a href="{{ route('profile', encrypt(Auth::guard('admin')->user()->id)) }}" method="POST">My Profile</a></li>
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                
                                    {{ Auth::guard('admin')->user()->name }} <span class="caret"></span></a>
                                
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('changepassword') }}"><span class="glyphicon glyphicon-pencil"></span> Change Password</a></li>
                            <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>