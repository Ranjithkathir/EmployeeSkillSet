@extends('layouts.custom1layout')

@section('content')

<div class="container">
	<div class="row detail">
		<h3>Employee Detail</h3>
		<hr>
		<div class="row">
            {!! Form::open(['route' => ['employeeupdate', encrypt($employeedetail->id)],'files' => 'true','enctype'=>'multipart/form-data','id'=>'myForm']) !!}
            <div class="row formdesign">
                <div class="col-md-4 col-sm-4 form-group">
                    {{ Form::label('empid', 'Employee Id :',['class' => 'control-label col-sm-4 ']) }}
                    <div class="col-sm-8">
                        {{ Form::text('empid', $employeedetail->id,['class' => 'form-control id','readonly']) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    {{ Form::label('empname', 'Name :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('empname', $employeedetail->Name,['class' => 'form-control', 'data-validation'=>'required']) }}
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    {{ Form::label('mobilenumber', 'Mobile No :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('mobilenumber', $employeedetail->MobileNumber,['class' => 'form-control', 'data-validation'=>'required number']) }}
                    </div>
                </div>
            </div>
            <div class="row formdesign">
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('employeenumber', 'Employee Number :',['class' => 'control-label col-sm-4','readonly']) }}
                    <div class="col-sm-8">
                        {{ Form::text('employeenumber', $employeedetail->EmployeeNumber,['class' => 'form-control','data-validation'=>'required']) }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('designation', 'Designation :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        <select class="addformdesign form-control" name="designation" data-validation='required'>
                        <option value="{{ $employeedetail->Designation }}">{{ $employeedetail->DesignationName }}</option>
                        @foreach($designation as $designations)
                            
                                <option value="{{ $designations->id }}" {{(old('designation')==$designations->id)? 'selected':''}}>{{ $designations->DesignationName }}</option>
                            
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row formdesign">
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('email', 'Email :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('email', $employeedetail->Email ,['class' => 'form-control','data-validation'=>'required email']) }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 form-group">
                    {{ Form::label('datejoin', 'Date Of Joining :',['class' => 'control-label col-sm-4']) }}
                    <div class="col-sm-8">
                        {{ Form::text('datejoin',$employeedetail->DateOfJoin,['class' => 'form-control datepicker',
                        'readonly', 'data-validation' => 'required' ]) }}
                    </div>
                </div>
            </div>
        </div>
	</div>
    <hr />
	<div class="row">
		<h3 id="skilldetail">Employee Skill Details :
        <span class="col-xs-2 col-lg-2" style="float:right;">
            <input class="addskills btn btn-success" type="button" value="Add New Skill" />    
        </span></h3>
		<hr>
		<div class="row justify-content-center">
        	<table id="skilldatas" class="table table-striped table-hover">
            	<thead>
                	<tr>
                    	<th>Skills</th>
                    	<th>Rating</th>
                    	<th>Edit Action</th>
                    	<th>Remove Action</th>
                	</tr>
            	</thead>
            	<tbody>
            		@forelse($skills as $skill)
                	<tr>
                    	<td>{{ $skill->Skills }}</td>
                        
                    	<td><input type="text" name="rateedit" class="form-control" size="1" value="{{ $skill->Rating }}" id="rateattr_{{$skill->id}}" readonly>
                    	</td>
                        
                    	<td><div>
    						<input class="edit btn btn-sm btn-info" type="button" value="Edit" />

    						<input class="save btn btn-sm btn-success" type="button" value="Save" /> 

    						<input type="hidden" id="hideSave_{{$skill->id}}" class="skillsHidden" name="skillsHidden" value="{{encrypt($skill->id)}}"/> 


    						<input class="cancel btn btn-sm btn-danger" type="button" value="Cancel" />
    						</div>
    					</td>

                        <td>
                            <a href="{{ url('DeleteSkill', ['id' => encrypt($skill->id)]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure to Delete?')">Delete</a>
                        </td>
                	</tr>

                	@empty
                	<tr>	
                    	<td colspan="5"><b>No Records found</b></td>
                	</tr>

                	@endforelse
                    
            	</tbody>
            </table>
        </div>
	</div>
    <div class="skillformadd">
    <div class="row">
            
           
            <div class="container">
                <div class="row formdesign">
                    <h3 id="skilldetail">Add Skill Sets :</h3>
                </div>
            </div>
            <div class="field_wrapper">
                <div class="row formdesign skillform">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="skill">Skill:</label>
                            <div class="col-sm-8">          
                                <input type="text" class="skill form-control" id="skill" name="skill[]" data-validation='required'>
                            </div>
                            <div>
                                <input type="hidden" id="skillsId" name="skillid[]" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="rate">Rating:</label>
                            <div class="col-sm-8">          
                                <input type="text" class="form-control" id="rate" name="rate[]" data-validation="number required" data-validation-allowing="range[1;10]" data-validation-error-msg="Rating must be between 1 to 10">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input class="addnewskills btn btn-sm btn-success" type="button" value="Save Skill" />
                    </div>
                </div>
                
            </div>  
        </div>
        </div>
    <div class="row formdesign">
        <div class="col-sm-12 col-md-12 text-right">
            {{ Form::submit('Save Changes',['class' => 'btn btn-sm btn-success addformdesign'])}}
                <a class="btn btn-sm btn-danger addformdesign"  href="{{ url('Employees') }}">Back To Employees</a>
        </div>
    </div>
    {{ csrf_field() }}
    {!! Form::close() !!}
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script type="text/javascript">
            $.validate({
                form : '#myForm'
            });
            $.validate({
                form : '.skillform'
            });
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('.addskills').click(function(){
        $(".skillformadd").toggle();
    });
	$('.edit').click(function() {
    	$(this).hide();
    	$(this).siblings('.save, .cancel').show();
    	$("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).removeAttr("readonly");
	});
	$('.cancel').click(function() {
    	$(this).siblings('.edit').show();
    	$(this).siblings('.save').hide();
    	$(this).hide();
    	$("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).attr('readonly',true);

	});
	$('.save').click(function() {
    	$(this).siblings('.edit').show();
    	$(this).siblings('.cancel').hide();
    	$(this).hide();
    	$("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).attr('readonly',true);
        var ratevalue = $("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).val();
        //alert(ratevalue);
    	//window.btoa($("#rate_2").val());
        if(ratevalue != '' && (ratevalue>0&&ratevalue<=10))
        {
    	   let  url =  "{{ url('UpdateSkillRate') }}"+"/"+$(this).siblings(".skillsHidden").val()+"/"+window.btoa($("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).val());
    	//console.log('test=>'+url);
    	   window.location.href=url;
        }
        else{
            alert('Enter the rating Or Rate Between 1 to 10');
            $("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).removeAttr("readonly");
            $(this).siblings('.edit').hide();
            $(this).show();
            $(this).siblings('.cancel').show();
        }
    	
	});
    $('.addnewskills').click(function() {
        
        var skillids = $('input[name="skillid[]"]').map(function(){return $(this).val();}).get();
        $.each(skillids, function( index, value ) {
            if(value == '' ){
               skillids[index] = 0;
            }
        });


        var rates = $('input[name="rate[]"]').map(function(){return $(this).val();}).get();
        var skillnames = $('input[name="skill[]"]').map(function(){return $(this).val();}).get();
        if(rates!='' && skillnames!=''){

        let  url =  "{{ url('skill/submit') }}"+"/"+window.btoa($('.id').val())+"/"+window.btoa(skillids)+"/"+window.btoa(rates)+"/"+window.btoa(skillnames);
        
        window.location.href=url;
        }
        else{
            alert('Enter the Skill or Rate Properly!!');
        }
    });
});
</script>
<script type="text/javascript">

        //Script for Dynamic fields and Autocomplete

            $(document).ready(function(){

                // var maxField = 10; //Input fields increment limitation
                // var addButton = $('.add_button'); //Add button selector
                // var $wrapper = $('.field_wrapper'); //Input field wrapper

        //Script for autocomplete 

                var autocompleteObjects = [];
                var ajaxData  = $.ajax({
                    url : "{{ url('autocomplete') }}",
                    success:function(data){
                        //console.log(data);
                        $.each(data, function(i, object) {
                            var object = {
                                value: i,
                                label: object
                            };
                            autocompleteObjects.push(object);
                        });
                    },
                    error:function(xhr){
                        console.log('error');
                    }
                });

                $('.skill').autocomplete({
                        minLength: 2, 
                        source:autocompleteObjects,
                        select: function (event, ui) {
                            $(".skill").val(ui.item.label);
                            $("#skillsId").val(ui.item.value);   

                            //$('#hiddenInput').attr('name', ui.item.value);
                            //$('#hiddenInput').val(ui.item.label);
                            return false;
                        }
                });

                //Dynamic Input div script starts

                var x = 1; //Initial field counter is 1
    
                //Once add button is clicked
            //     $(addButton).click(function(){
            //     //Check maximum number of input fields
            //         if(x < maxField){ 
            //             x++; //Increment field counter
                        
            //             $wrapper.append('<div class="row formdesign"><div class="col-md-4"><div class="form-group"><input type="hidden" id="hiddenInput_'+x+'" value="" name="name[]" /><label class="control-label col-sm-4" for="skill">Skill:</label><div class="col-sm-8"><input type="text" class="form-control skill_'+x+'" id="skill_'+x+'" name="skill[]" data-validation="required"><div><input type="hidden" id="skillsId_'+x+'" name="skillid[]" value=""></div></div></div></div><div class="col-md-4"><div class="form-group"><label class="control-label col-sm-4" for="rate">Rating:</label><div class="col-sm-8"><input type="text" class="form-control" id="rate_'+x+'" name="rate[]" data-validation="number" data-validation-allowing="range[1;10]" data-validation-error-msg="Rating must be between 1 to 10"></div></div></div><div class="col-md-4"><a href="javascript:void(0);" class="remove_button btn btn-danger">Cancel</a></div></div>'); //Add field html

        

                         $( "input[id=skill_"+ x +"]" ).autocomplete({
                             source: autocompleteObjects,
                            select: function (event, ui){
                                $(".skill_"+ x).val(ui.item.label);
                                     // $(".skill_"+ x).append('<input type="hidden" class="'+ui.item.label+'" id="'+ui.item.label+'" value="'+ui.item.value+'" />');
                                 $('#hiddenInput').attr('name', ui.item.value);
                                 //$('#hiddenInput').val(ui.item.label);
                                 $("input[id=skillsId_"+x+"]").val(ui.item.value);
                                 return false;
                             }
                         });  
                     //}
                 //});
    
            //     //Once remove button is clicked
            //     $('body').on('click', '.remove_button', function(e){
            //         e.preventDefault();
            //         $(this).parent().parent().remove();
            //             x--; //Decrement field counter
            //     });
                
             });
</script>
@endsection