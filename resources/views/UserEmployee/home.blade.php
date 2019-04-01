@extends('layouts.custom2layout')

@section('content')

<div class="container">
	<div class="row">
		@if(Session::has('loginsuccess'))
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-success">
						{{ Session::get('loginsuccess') }}
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
				</div>
			</div>
		@endif
	</div>
	<div class="service">
		<div class="row">
			<h3>Employee Dashboard</h3>
			<hr>
		</div>
		<div class="row">
			<div class="col-md-6 col-xs-6">

				<form action="{{ route('employee/manageskill', encrypt(Auth::guard('employee')->user()->id)) }}" method="POST">
				{{ csrf_field() }}
					<input type="image" class="img" name="employee" value="submit1" width="40%" src="{{ URL::asset('images/skills.jpg') }}" alt="submit Button">
				</form>
					<p><a href="{{ route('employee/manageskill', encrypt(Auth::guard('employee')->user()->id)) }}">Manage Skills</a></p>

			</div>
			<div class="col-md-6 col-xs-6">
				<form action="{{ route('employee/profile', encrypt(Auth::guard('employee')->user()->id)) }}" method="POST">
				{{ csrf_field() }}
					<input type="image" class="img" name="employee" value="submit1" width="40%" src="{{ URL::asset('images/jobprofile.png') }}" alt="submit Button">
				</form>
				<p><a href="{{ route('employee/profile', encrypt(Auth::guard('employee')->user()->id)) }}">View Profile</a></p>

			</div>
		</div>
	</div>
</div>

@endsection