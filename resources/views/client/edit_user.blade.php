@extends('layouts.master_client')

@section('title', 'Edit user')
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
<!-- resources/views/client/edit_user.blade.php -->

	
	  <div class="bs-docs-section">

        <div class="row">
        	{!! Form::open(array('class' => "form-horizontal")) !!}
        
			<div class="col-sm-2"></div>
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
          <div class="col-lg-12">
            <div class="well bs-component">
                <fieldset>
                   
                  
                  <div class="form-group">
                    <label for="first_name" class="col-lg-2 control-label">First name - optional</label>
                    <div class="col-lg-10">
                       {!! Form::text('first_name', $data['input_old']['first_name'], array('class' => "form-control", 'id' => 'first_name', 'placeholder' => 'first name')); !!}                    
						<br>
                    </div>
                  </div>
                                 
                   
                  <div class="form-group">
                    <label for="last_name" class="col-lg-2 control-label">Last name - optional</label>
                    <div class="col-lg-10">
                       {!! Form::text('last_name', $data['input_old']['last_name'], array('class' => "form-control", 'id' => 'last_name', 'placeholder' => 'last name')); !!}                    
						<br>
                    </div>
                  </div>
                                 
                   
                  <div class="form-group">
                    <label for="company" class="col-lg-2 control-label">Company or business name</label>
                    <div class="col-lg-10">
                       {!! Form::text('company', $data['input_old']['company'], array('class' => "form-control", 'id' => 'company', 'placeholder' => 'company')); !!}                    
						<br>
                    </div>
                  </div>
                                 
                   
                  <div class="form-group">
                    <label for="client_url" class="col-lg-2 control-label">client URL</label>
                    <div class="col-lg-10">
                       {!! Form::text('client_url', $data['input_old']['client_url'], array('class' => "form-control", 'id' => 'client_url', 'placeholder' => 'client URL')); !!}                    
						<br>
                    </div>
                  </div>
                                 
                                 
                    
                  
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <br>
                      <button type="reset" class="btn btn-default">Cancel</button>&nbsp;
                      <button type="submit" class="btn btn-primary">Edit your profile</button>
                    </div>
                  </div>
                </fieldset>
              {!! Form::close() !!}
            </div>
          </div>                 
        </div>
      </div>
	
<!-- 	
  
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
   {!! Form::label('first_name', 'First name'); !!}            
    </div>
<div class="col-sm-7"> 
   {!! Form::text('first_name', $data['input_old']['first_name']); !!}
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->

<!-- 
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
   {!! Form::label('last_name', 'Last name'); !!}            
    </div>
<div class="col-sm-7"> 
   {!! Form::text('last_name', $data['input_old']['last_name']); !!}
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
     
   
 <!--      
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
   {!! Form::label('company', 'Company or business'); !!}            
    </div>
<div class="col-sm-7"> 
   {!! Form::text('company', $data['input_old']['company']); !!}
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
     
     <!--  
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
   {!! Form::label('client_url', 'Client URL start page'); !!}            
    </div>
<div class="col-sm-7"> 
   {!! Form::text('client_url', $data['input_old']['client_url']); !!}
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
    
   

 <!--     
<div class="row">
<div class="col-sm-3"> <br><br><br></div>
<div class="col-sm-6"> 
    {!! Form::submit('Edit this user'); !!}          
    </div>  
<div class="col-sm-3"> </div>
</div><!-- end row -->
    


@endsection	