<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Employee;
use App\Designation;
use App\Skill;
use App\EmployeeSkill;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show(){

    	$employees = DB::table('employees')
    				->select('employees.id','employees.EmployeeNumber','employees.Name','employees.MobileNumber','employees.Email','users.name','designations.DesignationName')
    				->join('users','users.id','=','employees.CreatedBy')
                    ->join('designations','designations.id','=','employees.Designation')
    				->where('employees.IsDeleted','=','0')->get();

    	//print_r($employees);exit;

    	return view('Employee.employee')->with('employees',$employees);
    
    }

    public function addemployee(){

    	$empcheck = DB::table('employees')
    				->select('EmployeeNumber')
    				->orderby('id','desc')
    				->limit('1')->first();
    				


        $empnumber = preg_replace('/[^0-9]/', '', $empcheck->EmployeeNumber);

    	$alpha = "E";
    	if(empty($empcheck))
    	{
    		$initialempnum = 1;
    		$empnum = sprintf('%04d',$initialempnum);
    		$employeenumber = $alpha.$empnum;
    	}
    	if($empcheck)
    	{
    		$empnumber += 1; 
    		$empnum = sprintf('%04d',$empnumber);
    		$employeenumber = $alpha.$empnum;
    	}

    	// $empidprevent = DB::table('employees')
    	// 			->select('id','EmployeeNumber')
    	// 			->where('IsFullfilled','=','0','AND','EmployeeNumber','=','$employeenumber')
    	// 			->orderby('id','desc')
    	// 			->limit('1')->get();
    	
    	// if(count($empidprevent)==0)
    	// {

    	// 	$employee = new Employee;
    	// 	$employee->EmployeeNumber = $employeenumber;

    	// 	$employee->save();
    		
    	// }
    	
    	//return redirect('/NewEmployee');
        $designation = DB::table('designations')
                    ->select('id','DesignationName')
                    ->where('IsDeleted','=','0')->get();
                    //echo $employeenumber;exit;

        return view('Employee.addemployee',compact('designation','employeenumber'));

    }

    public function autocomplete(Request $request) {
 
       	$search = $request->get('term','');
      
        $result = DB::table('skills')->select('id','Skills')->get();

        $data = array();
       
       // if(count($result) > 0 && is_array($result)){
        foreach($result as $results){
        	if($results->Skills){
        		$data[$results->id] = trim($results->Skills);
        	}
        }
 	
        //}
        
        //echo '<pre>';print_r($data);
        if(count($data) > 0)
        	return $data;
        else
        	return ['value'=>'No Result Found','id'=>''];
    }

    public function insertEmployee(Request $request){

    	$this->validate($request, [
    		'Name' => 'required|regex:/^[a-zA-Z ]*$/',
    		'MobileNumber' => 'required|numeric|digits:10|unique:employees',
    		'EmployeeNumber' => 'required|unique:employees',
    		'designation' => 'required',
    		'email' => 'required|email|unique:employees',
    		'datejoin' => 'required',
    	],['Name.required' => 'Name is required','Name.regex' => 'Only Alphabet and Space are allowed in name','MobileNumber.required' => 'Mobile Number is required','MobileNumber.numeric' => 'Mobile Number must be Numeric','MobileNumber.digits'=>'Mobile Number must be 10 digit','email.email' => 'Email should be in email format','datejoin.required' => 'Date Of Joining Is required','rate[].numeric'=>'Rating is between 1 to 10']);

        $employee = new Employee;

        $employee->EmployeeNumber = $request->input('EmployeeNumber');
    	$employee->Name = $request->input('Name');
    	$employee->Email = $request->input('email');
    	$employee->MobileNumber = $request->input('MobileNumber');
    	$employee->Designation = $request->input('designation');
        $doj = $request->input('datejoin');
    	$employee->DateOfJoin = date("Y-m-d", strtotime($doj));
        $employee->password = Hash::make($request->input('password'));
    	$employee->CreatedBy = Auth::guard('admin')->user()->id;
			
    	//To save a employee

    	$employee->save();


    	//To redirect a page

    	//To save the employee Skills

   //      $skill_name = $request->input('skills');
   //  	$skills = $request->input('skillid');
   //  	$ids = $request->input('empid');
   //  	$rates = $request->input('rate');

    	
   //  	for($i=0;$i<count($skills);$i++)
 		// {
   //          $newSkillID = $skills[$i];

   //          if($newSkillID == '') {
   //              $skillDet = new Skill;
   //              $skillDet->Skills = $skill_name[$i];

   //              $skillDet->save();  

   //              $newSkillID = $skillDet->id;
   //          }

  	// 		$skill = new EmployeeSkill;
   // 			$skill->EmployeeId = $ids;
   // 			$skill->SkillId = $newSkillID;
   // 			$skill->Rating = $rates[$i];

   // 			$skill->save();	 
  			
 		// }

    	return redirect('/Employees')->with('success','Employee has added Successfully!!');
   
    }

    public function fulldetail($id){

    	$id = decrypt($id);
    	$employeedetail = DB::table('employees')
    					->select('employees.*','designations.DesignationName')
    					->join('designations','designations.id','=','employees.Designation')
    					->where('employees.id','=',$id)->first();

        $designation = DB::table('designations')
                    ->select('id','DesignationName')
                    ->where('IsDeleted','=','0')->get();

    	$skills = DB::table('employee_skills')
    				->select('skills.Skills','employee_skills.Rating','employee_skills.id')
    				->join('employees','employees.id','=','employee_skills.EmployeeId')
    				->join('skills','skills.id','=','employee_skills.SkillId')
    				->where('employee_skills.EmployeeId','=',$id)->get();
    	//print_r($skills);exit;

    	return view('Employee.viewdetail',compact('employeedetail','skills','designation')); 

    }

    public function updateemployee(Request $request,$id){

        $id = decrypt($id);
        
        $this->validate($request, [
            'empname' => 'required|regex:/^[a-zA-Z ]*$/',
            'mobilenumber' => 'required|numeric|digits:10|unique:employees,MobileNumber,'.$id,
            'employeenumber' => 'required|unique:employees,EmployeeNumber,'.$id,
            'designation' => 'required',
            'email' => 'required|email|unique:employees,Email,'.$id,
        ],['empname.required' => 'Name is required','empname.regex' => 'Only Alphabet and Space are allowed in name','mobilenumber.required' => 'Mobile Number is required','mobilenumber.numeric' => 'Mobile Number must be Numeric','mobilenumber.digits'=>'Mobile Number must be 10 digit','email.email' => 'Email should be in email format']);

        $employee = Employee::find($id);

        $employee->Name = $request->input('empname');
        $employee->Email = $request->input('email');
        $employee->EmployeeNumber = $request->input('employeenumber');
        $employee->MobileNumber = $request->input('mobilenumber');
        $employee->Designation = $request->input('designation');

        $employee->save();


        return back()->with('success','Employee detail updated Successfully!!');

        
    }

    public function deleteemployee($id)
    {

    	$id = decrypt($id);
    	$employee = Employee::find($id);

    	$employee->IsDeleted = '1';

    	$employee->save();

    	return redirect('/Employees')->with('failure','Employee detail Deleted Successfully!!');

    }

} 
