@extends('layouts.custom1layout')

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
            <h3>Our Services</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-4">
                <form action="{{ route('employees') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="image" class="img" name="employee" value="submit1" width="40%" src="{{ URL::asset('images/employeedetail.png') }}" alt="submit Button">
                </form>   
                    <p><a href="{{ URL::asset('Employees') }}">Employee Details</a></p>
                
            </div>
            <div class="col-md-4 col-xs-4">
                <form action="{{ route('skills') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="image" class="img" name="employee" value="submit1" width="40%" src="{{ URL::asset('images/skills.jpg') }}" alt="submit Button">
                
                    <p><a href="{{ URL::asset('Skills') }}">Skills Management</a></p>
                </form>
            </div>
            <div class="col-md-4 col-xs-4">
                <form action="{{ route('profile', encrypt(Auth::guard('admin')->user()->id)) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="image" class="img" name="employee" value="submit1" width="40%" src="{{ URL::asset('images/jobprofile.png') }}" alt="submit Button">
                
                    <p><a href="{{ route('profile', encrypt(Auth::guard('admin')->user()->id)) }}">Profile</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
