@extends('layouts.custom1layout')

@section('content')

<div class="container">
    <div class="row employee">
        <div class="col-xs-10 col-lg-10 employeehead">
            <p>Employees</p>
        </div>
        <div class="col-xs-2 col-lg-2 employeenewbutton">
            <button class="btn btn-success" name="add" onclick="location.href='{{ url('AddEmployee') }}'"><i class="fa fa-plus-circle"></i> Add Employee</button>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center datatableemployee">
        <table id="employeedatas" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Emp Number</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>E-mail</th>
                    <th>Designation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->EmployeeNumber }}</td>

                    <td>{{ $employee->Name }}</td>

                    <td>{{ $employee->MobileNumber }}</td>

                    <td>{{ $employee->Email }}</td>

                    <td>{{ $employee->DesignationName }}

                    <td><a href="{{ url('ViewEmployee', ['id' => encrypt($employee->id)]) }}" class="iconbutton"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                        <a href="{{ url('DeleteEmployee', ['id' => encrypt($employee->id)]) }}" class="iconbutton del" onclick="return confirm('Are You Sure to Delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5"><b>No Records found</b></td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>
 <script>
$(document).ready(function() {
    $('#employeedatas').DataTable({
    });
});
 </script>
@endsection