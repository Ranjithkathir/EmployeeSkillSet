<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords{
        redirectPath as laravelRedirectPath;
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login/admin';

    public function redirectPath()
    {
        // Do your logic to flash data to session...
        session()->flash('successmessage','Password Resetted Successfully...Please Login Again!!!');

        // Return the results of the method we are overriding that we aliased.
        return $this->laravelRedirectPath();
    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admin');
        $this->middleware('guest:employee');
    }
}
