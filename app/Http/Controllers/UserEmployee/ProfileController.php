<?php

namespace App\Http\Controllers\UserEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Employee;
use DB;
use Auth;
use Cookie;
use Tracker;
use Session;
use Hash;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('employee');
    }

    public function show($id){

        $id = decrypt($id);

        $employeedetail = DB::table('employees')
                        ->select('employees.*','designations.DesignationName')
                        ->join('designations','designations.id','=','employees.Designation')
                        ->where('employees.id','=',$id)->first();

        $designation = DB::table('designations')
                    ->select('id','DesignationName')
                    ->where('IsDeleted','=','0')->get();

        return view('UserEmployee.profileview',compact('employeedetail','designation'));
    
    }

    public function updateemployee(Request $request,$id){

        $id = decrypt($id);
        
        $this->validate($request, [
            'empname' => 'required|regex:/^[a-zA-Z ]*$/',
            'mobilenumber' => 'required|numeric|digits:10|unique:employees,MobileNumber,'.$id,
            'empno' => 'unique:employees,EmployeeNumber,'.$id,
            'designation' => 'required',
            'email' => 'required|email|unique:employees,Email,'.$id,
        ],['empname.required' => 'Name is required','empname.regex' => 'Only Alphabet and Space are allowed in name','mobilenumber.required' => 'Mobile Number is required','mobilenumber.numeric' => 'Mobile Number must be Numeric','mobilenumber.digits'=>'Mobile Number must be 10 digit','email.email' => 'Email should be in email format']);

        $employee = Employee::find($id);

        $employee->EmployeeNumber = $request->input('empno');
        $employee->Name = $request->input('empname');
        $employee->Email = $request->input('email');
        $employee->MobileNumber = $request->input('mobilenumber');
        $employee->Designation = $request->input('designation');

        $employee->save();


        return back()->with('success','Employee detail updated Successfully!!');

        
    }

    public function Changepassword(){
        return view('UserEmployee.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'old' => 'required|string|min:6',
            'new' => 'required|string|min:6',
            'newconfirm' => 'required_with:new|same:new|string|min:6',
        ],['old.required' => 'Current Password is required',
            'new.required' => 'New Password is required',
            'newconfirm.required_with' => 'Confirmation Password is required',
            'newconfirm.same' => 'New Password and Confirmation Password must be same']); 

        $id = auth()->guard('employee')->user()->id;

        //echo $id;exit;
        
        $updatepassword = Employee::find($id);

        $currentpassword = $request->input('old');

        if(Hash::check($currentpassword,$updatepassword->password)){

            $updatepassword->fill(['password' => Hash::make($request->input('new'))])->save();

            auth()->guard('employee')->logout();

            return redirect('/login')->with('successmessage', 'Password has changed successfully Please Login again!!!');
        }
        else{
            return redirect('employee/changepassword')->with('failure','Current password mismatches!!!');
        }
    
    }
}