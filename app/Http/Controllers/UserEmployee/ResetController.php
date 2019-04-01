<?php

namespace App\Http\Controllers\UserEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use App\Employee;
use Hash;
use DB;
use Carbon;
use Mail;

class ResetController extends Controller
{
	public function __construct()
    {
        
        $this->middleware('guest:employee')->except('logout');
    }

    public function showEmailForm()
    {  

        return view('Auth.passwords.email', ['urlemployee' => 'employee']);
    }


    public function sendPasswordResetToken(Request $request)
	{
    	$employee = DB::table('employees')
    				->select('Email','Name')
    				->where('Email','=', $request->email)->first();
    	
    	if ($employee) {
    		//echo $employee->Email;exit;
            $url = base64_encode($request->email . '#@$' . date('Y-m-d H:i:s'));
            $reset_url = url('reset/' . $url);
            DB::table('employees')
                    ->where('Email', $request->email)
                    ->update(['remember_token' => $url]);
            Mail::send('UserEmployee.passwordreset', ['employee' => $employee, 'reset_url' => $reset_url], function ($m) use ($employee) {
                $m->from('ranjithr.k.r.97@gmail.com', 'CG-VAK EmployeeSkillManagement');
                $m->to($employee->Email, $employee->Name)->subject('Password Reset!');
            });
        } else {
            return redirect('/employeeresetpassword')->with('failure','Invalid Email ID...');
        }
        
        return redirect('/login')->with('successsentmail','Mail Sent successfully...');
	}

	public function showPasswordResetForm($token){

        $user = Employee::where('remember_token', $token)
                ->first();
               
        if ($user) {
            $title = 'Reset Password';
            return view('auth.passwords.reset', ['urlemployee' => 'employee'], compact('title', 'token'));
        } 
        else {

            return redirect('/login')->with('successsentmail', 'Url Not Found !');
        }
	
	}

	public function resetRequest(Request $request) {
		//echo $request->token;exit;
		$this->validate($request, [
            'email' => 'required|email|min:6',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required_with:password|same:password|string|min:6',
        ],['email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password_confirmation.required_with' => 'Confirmation Password is required',
            'password_confirmation.same' => 'Password and Confirmation Password must be same']);

		

        $employee = Employee::where('email', $request->email)
                ->where('remember_token', $request->token);

        $employee = DB::table('employees')
                ->where('Email', $request->email)
                ->where('remember_token', $request->token)
                ->update(['password' =>  Hash::make($request->password)]);
        if ($employee) {

            DB::table('employees')
                    ->where('email', $request->email)
                    ->update(['remember_token' => "Successfully reset"]);
            return redirect('/login')->with('successmessage','Password Resetted Successfully...Please Login Again!!!');
        } else {
            return redirect('/reset/{$request->token}')->with('message','Invalid URL');
        }
    }
}