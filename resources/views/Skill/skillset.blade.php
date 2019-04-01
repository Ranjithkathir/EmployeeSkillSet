@extends('layouts.custom1layout')

@section('content')

<div class="container">
    <!-- <div class="row">
        <div class="col-sm-6"> -->
	<div class="skillset">
		<div class="row">
			<p class="addhead">Skill Based Search</p>
		</div>
		
        <div class="row skillmargin">
            <form action="{{Route('Search')}}" method="POST" id="myForm">
                {{ csrf_field() }}
                <div class = "row">
                    <div class = "col-sm-3">
                                   <label class="control-label" for="skill">Search Employee Based on Skill:
            </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="skill form-control" name="q" data-validation="required" value="" placeholder="Search Skill" data-validation-error-msg="Choose the Skill"> 
                        <input type="hidden" id="skillsId" name="skillid" value="" data-validation="required" value="" placeholder="Search Skill" data-validation-error-msg="Choose the Skill">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" id="search" class="btn btn-primary"><span class="glyphicon glyphicon-search">
                        </span></button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        @if(isset($Skills))
        <div id="hide">
            <div class="row">
                <div class="output">
                    <p class="addhead">Employees in the Selected Skill Set </p>
                </div>
            </div>

            

            <div class="row justify-content-center">

                <table id="skilldatas" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Email</th>
                            <th>SkillName</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                     
                    <tbody>
                        @forelse($Skills as $skil)
                            <tr>
                                <td>{{$skil->Name}}</td>
                                <td>{{$skil->Email}}</td>
                                <td>{{$skil->Skills}}</td>
                                <td>{{$skil->Rating}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"><b>No Employees found</b></td>
                            </tr>
                        @endforelse
                    </tbody>
                   
                </table>
            
            
            </div>

        </div>
		@endif	
	</div>
</div>





<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
 
<script>
    
    $.validate({
                form : '#myForm'
            });
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




</script>
<!-- </div> -->
</div>

@endsection