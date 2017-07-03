@extends('layouts.master_public')

@section('title', 'Contact form')
@section('page_specific_jquery')
<script>
$(document).ready(function(){
    $("#contactForm").submit(function(){
        console.log("contact form Submittedx");
    });
});
</script>

@endsection

@section('left_content')

<!-- resources/views/public/contact.blade.php -->


  
<!-- 
the next two divs are in the layout file, reprinted here, 
commented out, for continuity
<header id="header-5" class="light-header">
    <div class="container">

-->
        <div class="header-content">
            <div class="row">
               <div class="col-sm-6">
                    <!-- contact form 1 -->
                    <div id="contact-form-1">
                        <h3 class="log-title"><span class="text-primary"></span></h3>

    
<!-- begin form panel -->

 
         <div class="row">
         
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
           <!--     <form class="form-horizontal"> -->
          	{{ Form::open(array('url' => 'contact', 'class' => "form-horizontal", 'id' => "contactForm")) }}
            <fieldset>
 <!--             <legend>Legend</legend> -->
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                       {{ Form::email('email', $data['input_old']['email'], array('class' => "form-control", 'id' => 'email', 'placeholder' => 'email')) }}                    
						<br>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="first_name" class="col-lg-2 control-label">First name</label>
                    <div class="col-lg-10">
                       {{ Form::text('first_name', $data['input_old']['first_name'], array('class' => "form-control", 'id' => 'first_name', 'placeholder' => 'first name')) }}                    
						<br>
                    </div>
                  </div>
                                 
                   
                  <div class="form-group">
                    <label for="last_name" class="col-lg-2 control-label">Last name</label>
                    <div class="col-lg-10">
                       {{ Form::text('last_name', $data['input_old']['last_name'], array('class' => "form-control", 'id' => 'last_name', 'placeholder' => 'last name')) }}                    
						<br>
                    </div>
                  </div>
                   
                  
                  <div class="form-group">
    <!--               
                    <label for="telephoneInfo" class="col-lg-2 control-label">aadsf</label>
     -->              
                    <div class="col-lg-12">
                    
                     
                       For the telephone, please use numbers only.  If outside the USA, leave blank and use email.                   

                       
                       <br>
                    </div>
                   
                  </div>
                                 
                               
                  
                   
                  <div class="form-group">
                    <label for="telephone" class="col-lg-2 control-label"></label>
                    <div class="col-lg-10">
                       {{ Form::text('telephone', $data['input_old']['telephone'], array('class' => "form-control", 'id' => 'telephone', 'placeholder' => 'telephone')) }}                    
						<br>
                    </div>
                  </div>
                                 
                     
                  <div class="form-group">
                    <label for="message" class="col-lg-2 control-label">Message - required</label>
                    <div class="col-lg-10">
                       {{ Form::textarea('message', $data['input_old']['message'], array('class' => "form-control", 'id' => 'message', 'placeholder' => 'message', 'rows' => '3')) }}                    
						<br>
                    </div>
                  </div>
                  
                  
          <!--               
                  <div class="form-group">
                    <label for="captcha" class="col-lg-2 control-label">Captcha - required</label>
                    <div class="col-lg-10">
				<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>
                    
						<br>
                    </div>
                  </div>
             --->     
               
                      
                                                
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <br>
                    <!--  
                      <button type="reset" class="btn btn-default">Cancel</button>&nbsp;
                      <button type="submit" class="btn btn-primary">Submit</button>
					-->
					{{Form::submit('Contact us', array('class' => 'btn btn-md btn-primary-filled btn-form-submit btn-rounded'))}}
					{{ Form::close() }}
					
                    </div>
                  </div>
                </fieldset>
              {{ Form::close() }}
            </div><!-- end div for column -->
          </div><!-- end div for row -->                 
	<!-- end form panel -->
@endsection	
<!--  included in layout file, included here, and comment out, for continuity				
                     </div><!-- / contact form 1 -->
<!--                </div><!-- / col-sm-6 -->

<!-- end left side, start right side -->                
<!--
                <div class="col-sm-6 header-content-details">
                  <div id="right_header_panel"> <!-- this div controls white background and text size -->
<!-- end of continuity -->
@section('right_content')
          
                    <h3 class="header-brand">This is THE<span class="text-primary">ONE</span> </h3>
                    <h3>The Best Marketing / Landing Page Template</h3>
                    <p>Qusinque rhoncus tempus sem sed ornare. Aenean viverra ornare dui nec mollis. Vestibulum in dui sed velit consequat. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    <p>
                        <a href="#features" class="btn btn-md btn-dark btn-rounded page-scroll">Learn More</a>
                        <a href="#pricing" class="btn btn-md btn-primary-filled btn-rounded page-scroll">Our Pricing</a>
                    </p>	
@endsection	

@section('below_header_content')

<!-- / content -->

<!-- end laravel section content -->
@endsection
