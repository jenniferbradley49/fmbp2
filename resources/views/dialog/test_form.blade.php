@extends('layouts.master_dialog')

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
                       {!! Form::email('email', 'email text', array('class' => "form-control", 'id' => 'email', 'placeholder' => 'email')); !!}                    
						<br>
                    </div>
                  </div>
                   
                                 
                    
                  
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