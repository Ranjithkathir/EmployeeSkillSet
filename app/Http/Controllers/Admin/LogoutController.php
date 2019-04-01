<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;

class LogoutController extends Controller
{
	public function __construct()
    {
        
        $this->middleware('admin');
    }
    
    public function logout(){
    //logout user
    	auth()->guard('admin')->logout();
    // redirect to homepage
    	return redirect('/login/admin')->with('message', 'You have been logged out');
	}
}