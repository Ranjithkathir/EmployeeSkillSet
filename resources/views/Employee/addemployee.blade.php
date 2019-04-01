@extends('layouts.custom1layout')

@section('content')
<script>
$( function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy', minDate: -15, maxDate: 15 });
});
</script>
<div class="addform">
    <div class="container">
        <div class="row">
            <p class="addhead">Add New Employee</p>
            {!! Form::open(['url'=>'employee/submit','files' => 'true','enctype'=>'multipart/form-data','id'=>'myForm']) !!}
            <div class="row formdesign">
            	<div class="col-md-4 col-sm-4 form-group">
            		{{ Form::label('EmployeeNumber', 'Employee No :',['class' => 'control-label col-sm-5']) }}
            		<div class="col-sm-7">
            			{{ Form::text('EmployeeNumber',$employeenumber,['class' => 'form-control','data-validation'=>'required']) }}
            		</div>
            	</div>
            	<div class="col-md-4 col-sm-4">
            		{{ Form::label('Name', 'Name :',['class' => 'control-label col-sm-4']) }}
            		<div class="col-sm-8">
            			{{ Form::text('Name', '',['class' => 'form-control', 'data-validation'=>'required']) }}
            		</div>
            	</div>
            	<div class="col-md-4 col-sm-4">
            		{{ Form::label('MobileNumber', 'Mobile No :',['class' => 'control-label col-sm-4']) }}
            		<div class="col-sm-8">
            			{{ Form::text('MobileNumber', '',['class' => 'form-control', 'data-validation'=>'required number']) }}
            		</div>
            	</div>
            </div>
            <div class="row formdesign">
            	<div class="col-md-6 col-sm-6 form-group">
            		{{ Form::label('email', 'Email :',['class' => 'control-label col-sm-4']) }}
            		<div class="col-sm-8">
            			{{ Form::text('email', '',['class' => 'form-control','data-validation'=>'required']) }}
            		</div>
            	</div>
            	<div class="col-md-6 col-sm-6 form-group">
            		{{ Form::label('designation', 'Designation :',['class' => 'control-label col-sm-4']) }}
            		<div class="col-sm-8">
            			<select class="addformdesign form-control" name="designation" data-validation='required'>
                        <option value="">---Select Designation---</option>
                        @foreach($designation as $designations)
                            
                                <option value="{{ $designations->id }}" {{(old('designation')==$designations->id)? 'selected':''}}>{{ $designations->DesignationName }}</option>
                            
                        @endforeach
                        </select>
            		</div>
            	</div>
            </div>
            <div class="row formdesign">
            	<div class="col-md-6 col-sm-6 form-group">
            		{{ Form::label('password', 'Password :',['class' => 'control-label col-sm-4']) }}
            		<div class="col-sm-8">
            			{{ Form::password('password',['class' => 'form-control','data-validation'=>'required']) }}
            		</div>
            	</div>
            	<div class="col-md-6 col-sm-6 form-group">
            		{{ Form::label('datejoin', 'Date Of Joining :',['class' => 'control-label col-sm-4']) }}
            		<div class="col-sm-8">
            			{{ Form::text('datejoin','',['class' => 'form-control datepicker', 'data-validation' => 'required' ]) }}
            		</div>
            	</div>
            </div>
            <!--<div class="container">
            	<div class="row formdesign">
            		<h3 id="skillhead">Skill Sets :</h3>
            	</div>
        	</div>
        	<div class="field_wrapper">
        		<div class="row formdesign skillform">
        			<div class="col-md-4">
	        			<div class="form-group">
      						<label class="control-label col-sm-4" for="skill">Skill:</label>
      						<div class="col-sm-8">          
        						<input type="text" class="skill form-control" id="skill" name="skills[]" data-validation='required'>
      						</div>
      						<div>
      							<input type="hidden" id="skillsId" name="skillid[]" value="">
                                    if we took coment line make comment for this line alone<input type="hidden" id="skillslabel" name="skillidlabel[]" value="">
      						</div>
    					</div>
        			</div>
        			<div class="col-md-4">
        				<div class="form-group">
      						<label class="control-label col-sm-4" for="rate">Rating:</label>
      						<div class="col-sm-8">          
        						<input type="text" class="form-control" id="rate" name="rate[]" data-validation="number" data-validation-allowing="range[1;10]" data-validation-error-msg="Rating must be between 1 to 10">
      						</div>
    					</div>
        			</div>
        			<div class="col-md-4">
        				<a href="javascript:void(0);" class="add_button btn btn-success" title="Add field">Add More</a>
        			</div>
        		</div>
        		
        	</div> -->       

        	<div class="row formdesign">
        		<div class="col-sm-12 col-md-12 text-center">
        			{{ Form::submit('Submit',['class' => 'btn btn-sm btn-primary addformdesign'])}}
        		</div>
        	</div>
        	{{ csrf_field() }}
            {!! Form::close() !!}

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script type="text/javascript">
			  $.validate({
  				form : '#myForm'
			});
</script>

<!--<script type="text/javascript">

		//Script for Dynamic fields and Autocomplete

			// $(document).ready(function(){

   //  			var maxField = 10; //Input fields increment limitation
   //  			var addButton = $('.add_button'); //Add button selector
   //  			var $wrapper = $('.field_wrapper'); //Input field wrapper

    	//Script for autocomplete 

				// var autocompleteObjects = [];
				// var ajaxData  = $.ajax({
				// 	url : "{{ url('autocomplete') }}",
				// 	success:function(data){
				// 		//console.log(data);
				// 		$.each(data, function(i, object) {
				// 			var object = {
				//                 value: i,
				//                 label: object
				//             };
				//             autocompleteObjects.push(object);
				//         });
				// 	},
				// 	error:function(xhr){
				// 		console.log('error');
				// 	}
				// });
                
				// $('.skill').autocomplete({
    //                     minLength: 2,   
    //                     source: autocompleteObjects,
                        // source: function (request, response) {
                        //     //   console.log(request.term);
                        //      autocompleteObjects.forEach(function(item){
                        //          //console.log(item.label);
                        //         if(item.label == request.term){
                        //               response([{'value':'0000','label':'Add new Item'}]);
                        //          }else{
                        //               response(autocompleteObjects);
                        //         }
                          //     });
                        //  },
                        //select: function (event, ui) {
                            // if(ui.item.value  == 0000){
                            //     $("#skill").val('');
                            //     $("#skillslabeld").val(ui.item.label);
                            // }else{
                            //     $(".skill").val(ui.item.label);
                            //     $("#skillsId").val(ui.item.value);   
                            //     $("#skillslabeld").val('');
                            // }
                            //$(".skill").val(ui.item.label);
                            //$("#skillsId").val(ui.item.value); 
                        	//$('#hiddenInput').attr('name', ui.item.value);
                           	//$('#hiddenInput').val(ui.item.label);
                            //return false;
                       // }
               // });
				//Dynamic Input div script starts

    			//var x = 1; //Initial field counter is 1
    
    			//Once add button is clicked
    			//$(addButton).click(function(){
        		//Check maximum number of input fields
        			//if(x < maxField){ 
            			//x++; //Increment field counter
            			
            			//$wrapper.append('<div class="row formdesign"><div class="col-md-4"><div class="form-group"><input type="hidden" id="hiddenInput_'+x+'" value="" name="name[]" /><label class="control-label col-sm-4" for="skill">Skill:</label><div class="col-sm-8"><input type="text" class="form-control skill_'+x+'" id="skill_'+x+'" name="skill[]" data-validation="required"><div><input type="hidden" id="skillsId_'+x+'" name="skillid[]" value=""></div></div></div></div><div class="col-md-4"><div class="form-group"><label class="control-label col-sm-4" for="rate">Rating:</label><div class="col-sm-8"><input type="text" class="form-control" id="rate_'+x+'" name="rate[]" data-validation="number" data-validation-allowing="range[1;10]" data-validation-error-msg="Rating must be between 1 to 10"></div></div></div><div class="col-md-4"><a href="javascript:void(0);" class="remove_button btn btn-danger">Cancel</a></div></div>'); //Add field html

        

						//$( "input[id=skill_"+ x +"]" ).autocomplete({
							//source: autocompleteObjects,
							//select: function (event, ui){
							    //$(".skill_"+ x).val(ui.item.label);
                           			// $(".skill_"+ x).append('<input type="hidden" class="'+ui.item.label+'" id="'+ui.item.label+'" value="'+ui.item.value+'" />');
                           		//$('#hiddenInput').attr('name', ui.item.value);
                           		//$('#hiddenInput').val(ui.item.label);
                           		//$("input[id=skillsId_"+x+"]").val(ui.item.value);
                           		//return false;
                      		//}
						//});  
        			//}
    			//});
    
    			//Once remove button is clicked
    			//$('body').on('click', '.remove_button', function(e){
        			//e.preventDefault();
        			//$(this).parent().parent().remove();
        				//x--; //Decrement field counter
    			//});
				
			//});
</script>-->
        </div>
    </div>
</div>

@endsection
