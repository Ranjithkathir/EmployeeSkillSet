<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }

    public function showAdminLoginForm()    //For Admin
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/Home')->with('loginsuccess','Hey '.auth()->guard('admin')->user()->name.',!! you have been successfully logged in!');
            
        }
        return back()->withInput($request->only('email', 'remember'))->with('message','Invalid Username Password');;
    }


    public function employeeLogin(Request $request){


       $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        
        if (Auth()->guard('employee')->attempt(['Email' => $request->email, 'password' => $request->password])) {
            
            return redirect()->intended('/employee/Home')->with('loginsuccess','Hey '.auth()->guard('employee')->user()->Name.',!! you have been successfully logged in!');
            
        }
       

            return back()->withInput($request->only('email', 'remember'))->with('message','Invalid Username Password');
       

    }
}
