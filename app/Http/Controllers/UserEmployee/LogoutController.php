<?php

namespace App\Http\Controllers\UserEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;

class LogoutController extends Controller
{
	public function __construct()
    {
        
        $this->middleware('employee');
    }
    
    public function logout(){
    //logout user
    	auth()->guard('employee')->logout();
    // redirect to homepage
    	return redirect('/login')->with('message', 'You have been logged out');
	}
}