<!DOCTYPE html>
<html>
<head>
	@include('includes.headfiles')
</head>
<body>
<div id="headerfooter">
	@include('includes.header')
	<!--@if(!Request::is('AddClient') AND !Request::is('AddProject'))-->
		@include('includes.employeenavbar')
	<!--@endif-->
	<div class="container">
		<div class="row">
			<div>
				@if(!Request::is('employee/changepassword'))
					@include('includes.errormessage')
				@endif
				@yield('content')
			</div>
		</div>
	</div>
	@include('includes.footer')
</div>
</body>
</html>