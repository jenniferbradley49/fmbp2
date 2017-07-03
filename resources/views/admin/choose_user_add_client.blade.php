@extends('layouts.master_admin')

@section('title', 'Add user - admin')
@section('page_specific_jquery')

<script>
$(document).ready(function(){

	arrange_password_inputs();
	arrange_email_input();

	$("#include_password").change(function(){
		arrange_password_inputs();
	});

	$("#include_email").change(function(){
		arrange_email_input();
	});
	

	$("#order_by_email").click(function(){
		resort_users(0);
	});
	

	$("#order_by_lname").click(function(){
		resort_users(1);
	});
/*	
	$("#user_id").change(function(){

        var user_id = $("#user_id").val();

		propagate_csrf_code();
        jQuery.ajax({
            url: "/ajax/get_user_info_admin",
            type: "POST",
            data: {   
                "user_id":user_id,
            },
            dataType : "json",
            beforeSend: function () {
            },               
            success: function( data ) {
             	$("#first_name").val(data.first_name);
             	$("#last_name").val(data.last_name);
             	$("#email").val(data.email);
			},
            error: function( xhr, status, errorThrown ) {
                console.log("Ajax error");
            }
        });  // end jquery ajax

        // second ajax call, as cloaked client ID is inconsistent with object from first call
 // I commented this out, as there is no route for this
 // likely no controller function, breaks the page
/*
 		jQuery.ajax({
            url: "/ajax/get_cloaked_client_id_admin",
            type: "POST",
            data: {   
                "user_id":user_id,
            },
            dataType : "text",
            beforeSend: function () {
            },               
            success: function( data ) {
             	$("#cloaked_client_id").val(data);
 //            	$("#last_name").val(data.last_name);
 //            	$("#email").val(data.email);
			},
            error: function( xhr, status, errorThrown ) {
                console.log("Ajax error");
            }
 
        });  // end jquery ajax
*/ 
/*
	}); // end on dropdown change

*/
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
{{ $data['page_heading_content'] }}
    </div>
<div class="col-sm-3"> </div>
</div><!-- end row -->


	{!! Form::open() !!}
  
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
   {!! Form::label('user_id', 'Please choose a user'); !!}            
    </div>
<div class="col-sm-5">
<select name="client_user_id" id="user_id">
@foreach($data['arr_users'] as $key => $user_info)
<option value="{{ $key }}" {{ ($data['input_old']['user_id'] == $key ? ' selected="selected"' : '') }}>{{ $user_info }}</option>
@endforeach
</select>
   
</div>
    <div class="col-sm-2"><span id="status"></span></span> </div>
<div class="col-sm-1"> </div>
</div><!-- end row -->
  


    
<div class="row">
<div class="col-sm-3"> <br><br><br></div>
<div class="col-sm-6"> 
    {!! Form::submit('Choose user'); !!}          
    </div>  
<div class="col-sm-3"> </div>
</div><!-- end row -->
    

	{!! Form::close() !!}
@endsection	