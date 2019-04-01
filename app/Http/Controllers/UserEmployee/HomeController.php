<?php

namespace App\Http\Controllers\UserEmployee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('employee');
    }

    public function employee()
    {  

        return view('UserEmployee.home');
    }
}
