<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Cookie;
use Tracker;
use Session;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show($id){

    	$id = decrypt($id);
    	$myprofile = User::find($id);
    	return view('Admin.myprofile')->with('myprofile',$myprofile);

    }

    public function updateadmin(Request $request,$id){

        $id = decrypt($id);

        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|email|unique:users,email,'.$id,
        ],['name.regex' => 'Name Should be Alphabet']);

        $updateadmin = User::find($id);

        $updateadmin->name = $request->input('name');
        $updateadmin->email = $request->input('email');

        $updateadmin->save();

        return back()->with('success','Admin Details have been updated');
    }

    public function Changepassword(){
        return view('Admin.changepassword');
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

        $id = auth()->guard('admin')->user()->id;

        //echo $id;exit;
        
        $updatepassword = User::find($id);

        $currentpassword = $request->input('old');

        if(Hash::check($currentpassword,$updatepassword->password)){

            $updatepassword->fill(['password' => Hash::make($request->input('new'))])->save();

            auth()->guard('admin')->logout();

            return redirect('/login/admin')->with('successmessage', 'Password has changed successfully Please Login again!!!');
        }
        else{
            return redirect('/changepassword')->with('failure','Current password mismatches!!!');
        }
    
    }
}
