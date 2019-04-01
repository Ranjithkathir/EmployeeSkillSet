@extends('layouts.custom2layout')

@section('content')

<div class="container">
	<div class="row detail">
		<h3>My Profile</h3>
		<hr>
		<div class="row">
            {!! Form::open(['route' => ['employeeprofileupdate', encrypt($employeedetail->id)],'files' => 'true','enctype'=>'multipart/form-data','id'=>'myForm']) !!}
            <div class="row formdesign">
                <div class="col-md-4 col-sm-4 form-group">
                    {{ Form::label('empid', 'Employee Id :',['class' => 'control-label col-sm-4 ']) }}
                    <div class="col-sm-8">
                        {{ Form::text('empid', $employeedetail->id,['class' => 'form-control id','readonly']) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    {{ Form::label('empname', 'Name :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('empname', $employeedetail->Name,['class' => 'form-control', 'data-validation'=>'required']) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    {{ Form::label('mobilenumber', 'Mobile No :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('mobilenumber', $employeedetail->MobileNumber,['class' => 'form-control', 'data-validation'=>'required number']) }}
                    </div>
                </div>
            </div>
            <div class="row formdesign">
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('empno', 'Employee Number :',['class' => 'control-label col-sm-4','readonly']) }}
                    <div class="col-sm-8">
                        {{ Form::text('empno', $employeedetail->EmployeeNumber,['class' => 'form-control','readonly']) }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('designation', 'Designation :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        <select class="addformdesign form-control" name="designation" data-validation='required'>
                        <option value="{{ $employeedetail->Designation }}">{{ $employeedetail->DesignationName }}</option>
                        @foreach($designation as $designations)
                            
                                <option value="{{ $designations->id }}" {{(old('designation')==$designations->id)? 'selected':''}}>{{ $designations->DesignationName }}</option>
                            
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row formdesign">
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('email', 'Email :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('email', $employeedetail->Email ,['class' => 'form-control','data-validation'=>'required email']) }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('datejoin', 'Date Of Joining :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('datejoin',$employeedetail->DateOfJoin,['class' => 'form-control datepicker',
                        'readonly', 'data-validation' => 'required' ]) }}
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="row formdesign">
        <div class="col-sm-12 col-md-12 text-right">
            {{ Form::submit('Save Changes',['class' => 'btn btn-sm btn-success addformdesign'])}}
                <a class="btn btn-sm btn-danger addformdesign"  href="{{ url('employee/Home') }}">Back To Home</a>
        </div>
    </div>
    {{ csrf_field() }}
    {!! Form::close() !!}
</div>

@endsection