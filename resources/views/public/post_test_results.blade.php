@extends('layouts.master_admin')

@section('title', 'Edit client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/test_client.blade.php -->
	
        <div class="row">
       
                    
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
                       {{ $data['str_lead_destination_tested'] }}                    
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
                      {{ $data['str_test_id'] }}                    
            		<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
	
	<!-- headers for test post table -->					                                 
  	        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-3">
              	<label for="str_lead_destination_tested">lead dest tested</label>
            </div>
            <div class="col-lg-2">
             	test id                                        		
            </div>
             <div class="col-lg-5">
             	creation date/time                                       		
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
 <!-- loop for whole test_post table -->   
   @foreach ($data['test_post'] as $line)                
  		
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-3">
 				{{ $line->str_lead_destination_tested }}            
 			</div>
       		<div class="col-lg-2">
 				{{ $line->str_test_id }}            
 			</div>
       		<div class="col-lg-5">
 				{{ $line->created_at }}            
 			</div>
 			<div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
  @endforeach                
  		
  		
  		
              
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