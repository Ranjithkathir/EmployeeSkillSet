<!DOCTYPE html>
<html>
<head>
	@include('includes.headfiles')
</head>
<body>
<div id="headerfooter">
	@include('includes.header')
	<!--@if(!Request::is('AddClient') AND !Request::is('AddProject'))-->
		@include('includes.navbar')
	<!--@endif-->
	<div class="container">
		<div class="row">
			<div>
				@if(!Request::is('changepassword'))
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
