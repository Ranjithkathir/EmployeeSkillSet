@extends('layouts.custom2layout')

@section('content')

<h3 class="text-center" id="passwordchange"><b><i>Employee Password Change</i></b></h3>
    @if(session('failure'))
    <div class="alert alert-danger">
        {{ session('failure') }}
    </div>
    @endif
	<div class="updatepages">
		{!! Form::open(['route' => ['employeeupdatepassword'],'id' => 'updatepasswordform']) !!}
			<div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
    			{{ Form::label('old', 'Current Password :') }}
    			{{ Form::password('old',['class' => 'form-control']) }}

                <small class="text-danger">{{ $errors->first('old') }}</small>
    		</div>
    		<div class="form-group{{ $errors->has('new') ? ' has-error' : '' }}">
    			{{ Form::label('new', 'New Password :') }}
    			{{ Form::password('new',['class' => 'form-control']) }}

                <small class="text-danger">{{ $errors->first('new') }}</small>
    		</div>
    		<div class="form-group{{ $errors->has('newconfirm') ? ' has-error' : '' }}">
    			{{ Form::label('newconfirm', 'Confirm Password :') }}
    			{{ Form::password('newconfirm',['class' => 'form-control']) }}

                <small class="text-danger">{{ $errors->first('newconfirm') }}</small>
    		</div>
    		<div>
    			{{ Form::submit('Submit',['class' => 'btn btn-primary'])}}
    		</div>
		{!! Form::close() !!}
	</div>

@endsection