@extends('layouts.master_admin')

@section('title', 'Add client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/auth/sign_up.blade.php -->
	
	  <div class="bs-docs-section">
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
          <div class="col-lg-12">
            <div class="well bs-component">
          <!--     <form class="form-horizontal"> -->
                <fieldset>
 <!--             <legend>Legend</legend> -->
                  <div class="form-group">
                    <label for="str_email_two" class="col-lg-2 control-label">backup email</label>
                    <div class="col-lg-10">
                       {{ Form::email('str_email_two', $data['input_old']['str_email_two'], array('class' => "form-control", 'id' => 'str_email_two', 'placeholder' => 'additional email')) }}                    
						<br>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="str_website" class="col-lg-2 control-label">Client URL - required</label>
                    <div class="col-lg-10">
                       {{ Form::text('str_website', $data['input_old']['str_website'], array('class' => "form-control", 'id' => 'str_website', 'placeholder' => 'client website URL')) }}                    
						<br>
                    </div>
                  </div>
                                 
                   
                  <div class="form-group">
                    <label for="str_telephone_one" class="col-lg-2 control-label">telephone 1 - required</label>
                    <div class="col-lg-10">
                       {{ Form::text('str_telephone_one', $data['input_old']['str_telephone_one'], array('class' => "form-control", 'id' => 'str_telephone_one', 'placeholder' => 'telephone one')) }}                    
						<br>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="str_telephone_two" class="col-lg-2 control-label">telephone 2 - optional</label>
                    <div class="col-lg-10">
                       {{ Form::text('str_telephone_two', $data['input_old']['str_telephone_two'], array('class' => "form-control", 'id' => 'str_telephone_two', 'placeholder' => 'telephone two')) }}                    
						<br>
                    </div>
                  </div>
                                   
   <!--                
                  <div class="form-group">
                    <label for="telephone" class="col-lg-2 control-label">Telephone - optional</label>
                    <div class="col-lg-10">
						<br>
                    </div>
                  </div>
 -->                                
                     
                  <div class="form-group">
                    <label for="str_company" class="col-lg-2 control-label">Company - optional</label>
                    <div class="col-lg-10">
                       {{ Form::text('str_company', $data['input_old']['str_company'], array('class' => "form-control", 'id' => 'str_company', 'placeholder' => 'company')) }}                    
						<br>
                    </div>
                  </div>
                  
                                 
                         
                  <div class="form-group">
                    <label for="str_city" class="col-lg-2 control-label">City</label>
                    <div class="col-lg-10">
                       {{ Form::text('str_city', $data['input_old']['str_city'], array('class' => "form-control", 'id' => 'str_city', 'placeholder' => 'city')) }}                    
						<br>
                    </div>
                  </div>
                  
                                 
                     
                  <div class="form-group">
                    <label for="str_zip" class="col-lg-2 control-label">zip - optional</label>
                    <div class="col-lg-10">
                       {{ Form::text('str_zip', array('class' => "form-control", 'id' => 'str_zip', 'placeholder' => 'zip code')) }}                    
						<br>
                    </div>
                  </div>
                  
                  
                                 
                     
                  <div class="form-group">
                    <label for="int_state_id" class="col-lg-2 control-label">choose a state</label>
                    <div class="col-lg-10">
                       {{ Form::password('password_confirmation', array('class' => "form-control", 'id' => 'password_confirmation', 'placeholder' => 'password confirmation')) }}                    
						<br>
                    </div>
                  </div>
                  
              
 <!--                     
                  <div class="form-group">
                    <label for="recaptcha" class="col-lg-2 control-label">Captcha required</label>
                    <div class="col-lg-10">
						<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>
						
					</div>
-->                                               
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <br>
                      <button type="reset" class="btn btn-default">Cancel</button>&nbsp;
                      <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                  </div>
                </fieldset>
              {{ Form::close() }}
            </div>
          </div>                 
        </div>
      </div>
@endsection	