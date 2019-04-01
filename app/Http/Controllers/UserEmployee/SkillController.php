<?php

namespace App\Http\Controllers\UserEmployee;

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

    	$this->middleware('employee');
  	
  	}

  	public function show($id){
      $id = decrypt($id);
      
  		
  		$employeeskill = DB::table('employee_skills')
    				->select('skills.Skills','employee_skills.Rating','employee_skills.id','employees.id AS empid')
    				->join('employees','employees.id','=','employee_skills.EmployeeId')
    				->join('skills','skills.id','=','employee_skills.SkillId')
    				->where('employee_skills.EmployeeId','=',$id)->get();

  		return view('UserEmployee.skillview',compact('employeeskill','id'));
  	
  	}

  	public function updateskillrate($id,$rate){
    
    	$id = decrypt($id);
    	$rate = base64_decode($rate);
    
    	$updateskillrate = EmployeeSkill::find($id);

    	$updateskillrate->Rating = $rate;
    
    	$updateskillrate->save();

    	return back()->with('success','Skill Rating updated Successfully!!');

  	}

    public function errorrate(){

      return back()->with('failure','Enter the rating between 1 to 10');

    }

  	public function deleteskills($id){

    	   $id = decrypt($id);

    	   $deleteskill = EmployeeSkill::find($id);
      	$deleteskill->delete();

      	return back()->with('failure','Skill Removed Successfully!!');
      
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

    public function insertnewskills($id,$skillids,$rates,$skillnames){

    	$id = base64_decode($id);
      //echo $id ;exit;
      
      	$skillid = explode(',',base64_decode($skillids));
      	$rate = explode(',',base64_decode($rates));
      	$skillsnames = explode(',',base64_decode($skillnames));
      	//echo $id;exit;
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

}