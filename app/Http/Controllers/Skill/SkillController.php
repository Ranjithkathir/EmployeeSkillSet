<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use DB;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Employee;
use App\EmployeeSkill;
use App\Skill;

class SkillController extends Controller{

	public function __construct(){

    	$this->middleware('admin');
  	
  	}

  	public function show(){

  		$employee = DB::table('employees')
  					->select('id','Name')
  					->where('IsDeleted','=','0')->get();

  		return view('Skill.skillset',compact('employee'));
  	
  	}

  	public function insertnewskills($id,$skillids,$rates,$skillnames){

    	$id = base64_decode($id);
      	$skillid = explode(',',base64_decode($skillids));
      	$rate = explode(',',base64_decode($rates));
      	$skillsnames = explode(',',base64_decode($skillnames));
      
      	$count=0;$countname=0;

    	$skillspresent = DB::table('employee_skills')
              	->select('SkillId')
              	->where('EmployeeId','=',$id)->get();

    	$skillNamePresent = DB::table('skills')
                        ->select('Skills')->get();
            
    	$Skillids = array();
    	$Skillnames = array();  

    	for($skilid=0;$skilid<count($skillspresent);$skilid++)
    	{
        	array_push($Skillids,$skillspresent[$skilid]->SkillId);
    	}
    
    	for($skillsname=0;$skillsname<count($skillNamePresent);$skillsname++)
    	{
        	array_push($Skillnames, $skillNamePresent[$skillsname]->Skills);
    	}
      
    	$idintersect = array_intersect($skillid,$Skillids);
    	$nameintersect = array_intersect(array_map('strtolower', $skillsnames),array_map('strtolower', $Skillnames));
      
    	if(!empty($idintersect)){
        	$count++;
    	}
    	if(!empty($nameintersect)){
        	$countname++;
    	}
    

      	for($i=0;$i<count($skillid);$i++){
        
        	if($count==0){

        		if($countname == 0 && $skillid[$i] == 0){
          
          			$skillDet = new Skill;
          			$skillDet->Skills = $skillsnames[$i];
          			$skillDet->save(); 

        			$newSkillID = $skillDet->id;

        			$skill = new EmployeeSkill;
        			$skill->EmployeeId = $id;
        			$skill->SkillId = $newSkillID;
        			$skill->Rating = $rate[$i];

        			$skill->save(); 

        			return back()->with('success',"Employee's skills added successfully");

        		}
        		else if($countname > 0 && $skillid[$i]!=0 && $count == 0){
          
          			$skill = new EmployeeSkill;
        			$skill->EmployeeId = $id;
        			$skill->SkillId = $skillid[$i];
        			$skill->Rating = $rate[$i];

        			$skill->save(); 

        			return back()->with('success',"Employee's skills added successfully");

        		}
        		else{

          			return back() ->with('failure',"Employee's Skills has already listed Please choose from that!!");

        		}
        	}
        	else{

      			return back()->with('failure',"Employee's Skills has already noted!!");

    		}
      	}    

	}

	public function updateskillrate($id,$rate){
    
    	$id = decrypt($id);
    	$rate = base64_decode($rate);
    
    	$updateskillrate = EmployeeSkill::find($id);

    	$updateskillrate->Rating = $rate;
    
    	$updateskillrate->save();

    	return back()->with('success','Skill Rating updated Successfully!!');

  	}

  	public function deleteskills($id){

    	$id = decrypt($id);

    	$deleteskill = EmployeeSkill::find($id);
      	$deleteskill->delete();

      	return back()->with('failure','Skill Removed Successfully!!');
      
    }

    public function showEmployeeSkill(){

     
      $id=Input::get('skillid');
      $skillname=Input::get('q');
      
    try{
      if(empty($id)){
        return Redirect('/Skills')->with('failure','You Choose Different Skillset So, Choose the Skillset From Dropdown');
      }
      else{
      $Skills = DB::table('employee_skills')
                ->select('employees.Name','employees.Email','skills.Skills','employee_skills.Rating')
                ->join('employees','employees.id','=','employee_skills.EmployeeId')
                ->join('skills','employee_skills.SkillId','=','skills.id')
                ->where('employee_skills.SkillId','=',$id)
                ->where('employees.IsDeleted','=','0')
                ->orderBy('employee_skills.Rating','desc')->get();
      }
    }
    catch(MethodNotAllowedHttpException $error){
      return Redirect('/Search')->withError($error->getMessage())->withInput();
    }
      //echo '<pre>'; print_r($Skills);exit;
      
      return view('Skill.skillset',compact('Skills'));
      
      }

    

}