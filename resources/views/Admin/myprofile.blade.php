@extends('layouts.custom1layout')

@section('content')

<div class="container">
	<div class="row profilehead">
		<p class="addhead">My Profile</p>
	</div>
	<div class="row profileview">
        {!! Form::open(['route' => ['adminupdate', encrypt($myprofile->id)],'files' => 'true','enctype'=>'multipart/form-data','id'=>'myForm']) !!}
            <div class="col-xs-12">
                <table align="center" class="addpc">
                    <tr>
                        <td><b><div class="myaccformat">Name :</div></b></td>
                        <td>{{ Form::text('name', $myprofile->name,['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td><b><div class="myaccformat">E-mail :</div></b></td>
                        <td>{{ Form::text('email', $myprofile->email,['class' => 'form-control']) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            {{ Form::submit('Save Changes',['class' => 'btn btn-sm btn-success addformdesign'])}}
                            <a class="btn btn-sm btn-danger addformdesign"  href="{{ url('Home') }}">Back To Home</a></td>
                        </td>
                    </tr>
                </table>
            </div>
        {{ csrf_field() }}
        {!! Form::close() !!}
    </div>
</div>

@endsection