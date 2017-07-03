@extends('layouts.master_public')

@section('title', 'Sign up')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/auth/sign_up.blade.php -->
	
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
          <!--     <form class="form-horizontal"> -->
                <fieldset>
 <!--             <legend>Legend</legend> -->
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email - required</label>
                    <div class="col-lg-10">
                       {!! Form::email('email', $data['input_old']['email'], array('class' => "form-control", 'id' => 'email', 'placeholder' => 'email')); !!}                    
						<br>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="first_name" class="col-lg-2 control-label">First name - required</label>
                    <div class="col-lg-10">
                       {!! Form::text('first_name', $data['input_old']['first_name'], array('class' => "form-control", 'id' => 'first_name', 'placeholder' => 'first name')); !!}                    
						<br>
                    </div>
                  </div>
                                 
                   
                  <div class="form-group">
                    <label for="last_name" class="col-lg-2 control-label">Last name - required</label>
                    <div class="col-lg-10">
                       {!! Form::text('last_name', $data['input_old']['last_name'], array('class' => "form-control", 'id' => 'last_name', 'placeholder' => 'last name')); !!}                    
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
                    <label for="company" class="col-lg-2 control-label">Company - optional</label>
                    <div class="col-lg-10">
                       {!! Form::text('company', $data['input_old']['company'], array('class' => "form-control", 'id' => 'company', 'placeholder' => 'company')); !!}                    
						<br>
                    </div>
                  </div>
                  
                                 
                         
                  <div class="form-group">
                    <label for="client_url" class="col-lg-2 control-label">Client URL - required</label>
                    <div class="col-lg-10">
                       {!! Form::text('client_url', $data['input_old']['client_url'], array('class' => "form-control", 'id' => 'client_url', 'placeholder' => 'client URL')); !!}                    
						<br>
                    </div>
                  </div>
                  
                                 
                     
                  <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password - required</label>
                    <div class="col-lg-10">
                       {!! Form::password('password', array('class' => "form-control", 'id' => 'password', 'placeholder' => 'password')); !!}                    
						<br>
                    </div>
                  </div>
                  
                  
                                 
                     
                  <div class="form-group">
                    <label for="password_confirmation" class="col-lg-2 control-label">Password confirmation - required</label>
                    <div class="col-lg-10">
                       {!! Form::password('password_confirmation', array('class' => "form-control", 'id' => 'password_confirmation', 'placeholder' => 'password confirmation')); !!}                    
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
              {!! Form::close() !!}
            </div>
          </div>                 
        </div>
      </div>
@endsection	