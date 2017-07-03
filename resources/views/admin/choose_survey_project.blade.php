@extends('layouts.master_admin')

@section('title', 'Add survey project - admin')
@section('page_specific_jquery')

<script>
$(document).ready(function(){

//	arrange_password_inputs();
//	arrange_email_input();

//	$("#include_password").change(function(){
//		arrange_password_inputs();
//	});

//	$("#include_email").change(function(){
//		arrange_email_input();
//	});
	

	$("#order_by_email").click(function(){
		resort_users(0);
	});
	

	$("#order_by_lname").click(function(){
		resort_users(1);
	});
	
	$("#user_id").change(function(){

        var user_id = $("#user_id").val();

		propagate_csrf_code();
        jQuery.ajax({
            url: "/ajax/get_role_info_admin",
            type: "POST",
            data: {   
                "user_id":user_id,
            },
            dataType : "json",
            beforeSend: function () {
                console.log('AJAX sent');
            },               
            success: function( data ) {
 // populate roles available
				$("#role_id").empty();
				$("#role_id").append(new Option("Please choose a role", "0"));
				$.each(data.arr_roles_available, function(index, item) {
					$("#role_id").append(new Option(item.name, item.id));
		        });
// populate roles already possessed		        
				$("#roles_possessed").empty();
				$("#roles_possessed").append("<ul>");
				$.each(data.arr_roles_possessed, function(index, item) {
					$("#roles_possessed").append("<li>"+item.name+"</li>");					
		        });
				$("#roles_possessed").append("</ul>");
			},
            error: function( xhr, status, errorThrown ) {
                console.log("Ajax error");
            }
        });  // end jquery ajax
    }); // end on dropdown change


    function arrange_password_inputs()
    {        
    	if ($("#include_password").prop('checked'))
    	{        	
    		$("#password").prop('disabled', false);
    		$("#password_confirmation").prop('disabled', false);
    		$("#password_block").show(1500);
    	}
    	else
    	{		
    		$("#password").prop('disabled', true);
    		$("#password_confirmation").prop('disabled', true);
    		$("#password_block").hide(1500);
		}		
    }  // end function arrange password inputs       


    function arrange_email_input()
    {        
    	if ($("#include_email").prop('checked'))
    	{        	
    		$("#email").prop('disabled', false);
    		$("#email_block").show(1500);
    	}
    	else
    	{		
    		$("#email").prop('disabled', true);
    		$("#email_block").hide(1500);
		}		
    }  // end function arrange email input       
    

    function resort_users(bool_order_by_lname)
    {
		propagate_csrf_code();
        jQuery.ajax({
            url: "/ajax/resort_users_admin",
            type: "POST",
            data: {   
                "bool_order_by_lname":bool_order_by_lname,
            },
            dataType : "json",
            beforeSend: function () {
            },               
            success: function( data ) {
				$("#user_id").empty();
				$.each(data, function(index, item) {
		        	$("#user_id").append(new Option(item.content, item.id));
		        });
			},
            error: function( xhr, status, errorThrown ) {
                console.log("Ajax error");
            }
        });  // end jquery ajax
        
    }  // end function resort users

    function propagate_csrf_code()
    {
        var csrf_token = $("input[name=_token]").val();

// laravel imposes csrf protection - the ajax setup 
// sends the csrf token in the header to remove the 
// 500 internal service error 
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': csrf_token
			}
		});
    }     // end function propagate_csrf_code  
});
</script>
@endsection

@section('content')

<div class="row">
<div class="col-sm-3"><br><br><br><br><br><br> </div>
<div class="col-sm-6"> 
Choose Survey Project - admin
    </div>
<div class="col-sm-3"> </div>
</div><!-- end row -->

	{{ Form::open() }}
  
<div class="row">
<div class="col-sm-2"><br><br><br><br><br><br> </div>
<div class="col-sm-8"> 
@if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    </div>
<div class="col-sm-2"> </div>
</div><!-- end row -->
    
     
      
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
projects already in place
</div>
<div class="col-sm-7"> 

    
<div class="col-sm-1"> </div>
</div><!-- end row -->

       
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3" style="text-align:center"> 

</div>
<div class="col-sm-6" style="text-align:center"> 
text
</div>
 <div class="col-sm-1" style="text-align:center"> 

</div> 
<div class="col-sm-1"> </div>
</div><!-- end row -->

@foreach ($data['existing_projects'] as $project)
        
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 

</div>
<div class="col-sm-6"> 
{{ $project->str_text }}
</div>
 <div class="col-sm-1"> 

 </div> 
<div class="col-sm-1"> </div>
</div><!-- end row -->
 
 @endforeach    
    
     
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
   {{ Form::label('int_survey_project_id', 'Choose the title of the project') }}            
    </div>
<div class="col-sm-5">
   {{ Form::select('int_survey_project_id', $data['arr_projects']) }}
</div>
    <div class="col-sm-2"><span id="status"></span></div>
<div class="col-sm-1"> </div>
</div><!-- end row -->

<!-- begin choose action radio group -->
<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-6">Choose an action to execute</div>
				
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Manipulate question or item for this project') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'manipulate', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Add question for this project') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'add', true) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Edit this project') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'edit', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Delete this project') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'delete', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Add lead info item') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'add_lead_info', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Choose lead info item for editing or deleting') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'choose_lead_info', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->



<!-- end choose action radion group -->


    
<div class="row">
<div class="col-sm-3"> <br><br><br></div>
<div class="col-sm-6"> 
    {{ Form::submit('Choose project') }}          
    </div>  
<div class="col-sm-3"> </div>
</div><!-- end row -->
    

	{{ Form::close() }}
@endsection	