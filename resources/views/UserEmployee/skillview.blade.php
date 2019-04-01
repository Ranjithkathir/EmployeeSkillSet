@extends('layouts.custom2layout')

@section('content')

<div class="container">

	<div class="row">
		<h3 id="skilldetail">Skill Management :
			<span class="col-xs-2 col-lg-2" style="float:right;">
				<input class="addskills btn btn-success" type="button" value="Add New Skill" /> 
			</span></h3>
		<hr>
		<div class="row justify-content-center">
			<table id="employeeskills" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Skills</th>
						<th>Rating</th>
						<th>Edit Action</th>
						<th>Remove Action</th>
					</tr>
				</thead>

				<tbody>

					@forelse($employeeskill as $skill)
					<tr>
						<td>{{ $skill->Skills }}</td>

						<td><input type="text" name="rateedit" class="form-control" size="1" value="{{ $skill->Rating }}" id="rateattr_{{$skill->id}}" readonly></td>

						<input type="hidden" name="id" class="form-control id" value="{{ $skill->empid }}" readonly>

						<td>
							<div>
								<input class="edit btn btn-sm btn-info" type="button" value="Edit" />

								<input class="save btn btn-sm btn-success" type="button" value="Save" /> 

								<input type="hidden" id="hideSave_{{$skill->id}}" class="skillsHidden" name="skillsHidden" value="{{encrypt($skill->id)}}"/> 


								<input class="cancel btn btn-sm btn-danger" type="button" value="Cancel" />
							</div>
						</td>

						<td>
							<a href="{{ url('DeleteEmpSkill', ['id' => encrypt($skill->id)]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure to Delete?')">Delete</a>
						</td>
					</tr>

					@empty
					<tr>
                    <input type="hidden" name="id" class="form-control id" value="{{ $id }}" readonly>	
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
</div>

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
    	//window.btoa($("#rate_2").val());
        if(ratevalue != '' && (ratevalue>0&&ratevalue<=10))
        {
    	   let  url =  "{{ url('UpdateRate') }}"+"/"+$(this).siblings(".skillsHidden").val()+"/"+window.btoa($("#rateattr_"+$(this).siblings(".skillsHidden").attr("id").split("_")[1]).val());
    	//console.log('test=>'+url);
    	   window.location.href=url;
        }
        else{
            window.location.href = "{{ url('/Rate') }}";
        }
    	
	});

	var autocompleteObjects = [];
                var ajaxData  = $.ajax({
                    url : "{{ url('empAutocomplete') }}",
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
                var x = 1;
                $("input[id=skill_"+ x +"]" ).autocomplete({
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

    $('.addnewskills').click(function() {
        
        var skillids = $('input[name="skillid[]"]').map(function(){return $(this).val();}).get();
        $.each(skillids, function( index, value ) {
            if(value == '' ){
               skillids[index] = 0;
            }
        });


        var rates = $('input[name="rate[]"]').map(function(){return $(this).val();}).get();
        var skillnames = $('input[name="skill[]"]').map(function(){return $(this).val();}).get();

        if(rates!='' && skillnames!='')
        {
            let  url =  "{{ url('newskill/submit') }}"+"/"+window.btoa($('.id').val())+"/"+window.btoa(skillids)+"/"+window.btoa(rates)+"/"+window.btoa(skillnames);
        
            window.location.href=url;
        }
        else
        {
            alert('Enter the Skill or Rate Properly!!');
        }
        
    });

});

</script>

@endsection