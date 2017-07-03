@extends('layouts.master_admin')

@section('title', 'Edit client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/test_client.blade.php -->
	
        <div class="row">
        	{{ Form::open(array('class' => "form-horizontal")) }}
        	
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
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	<label for="int_client_id">Client ID for company being tested</label>
            </div>
            <div class="col-lg-6">
                                          
						<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
						                                 
                   
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	<label for="str_company">Company lead destination being tested</label>
            </div>
            <div class="col-lg-6">
                                         
						<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
						                                 
 					                       
                    
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	<label for="str_lead_destination">Original URL for web lead integration </label>
            </div>
            <div class="col-lg-6">
						<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
						                                 
                     
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	<label for="str_lead_destination_last">last tested URL for web lead integration </label>
            </div>
            <div class="col-lg-6">
						<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
						                                 
                      
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	<label for="str_lead_destination_tested">modified URL for web lead integration - start with http(s)://</label>
            </div>
            <div class="col-lg-6">
                       {{ Form::text('str_lead_destination_tested', '',  array('class' => "form-control", 'id' => 'str_lead_destination_tested', 'placeholder' => 'enter modified lead destination here')) }}                    
						<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
						                                 
  		
                    
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	<label for="str_test_id">test ID for showing which test worked/</label>
            </div>
            <div class="col-lg-6">
                       {{ Form::text('str_test_id', '', array('class' => "form-control", 'id' => 'str_test_id', 'placeholder' => 'enter test ID here')) }}                    
						<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
						                                 
  		
  		
<!-- start submit -->			
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-3"><button type="reset" class="btn btn-default">Cancel</button>&nbsp;
				
				</div>
				<div class="col-lg-7"> <button type="submit" class="btn btn-primary">Test client</button></div>
				<div class="col-lg-1">&nbsp;{{ Form::close() }}
				</div>
			</div><!-- end row, level 2 -->
<!-- end submit -->
			
              
 <!--                     
                  <div class="form-group">
                    <label for="recaptcha" class="col-lg-2 control-label">Captcha required</label>
                    <div class="col-lg-10">
						<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>
						
					</div>
-->                                               
<!--            </div>
          </div>                 
        </div>
-->
        <div class="row">
          <div class="col-lg-12">
            
            * just enough info to enable identification
          </div>
        </div>
@endsection	