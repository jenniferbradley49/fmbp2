@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
		$(document).ready(function() {
			
		}); // end document ready function

		
	    </script>

@endsection

@section('left_content')
<!-- /app/resources/views/public/message.blade.php -->
  
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
	
	<div class="col-lg-12"> <!-- begin col -->
<br />	
	We know that your time is valuable.  This is the last page / screen. 
	 <!-- Please do not forget to click on "Find Publishers"
	  at the bottom of this page.-->
<br /><br /><br />
	</div> <!-- end col -->
	
</div><!-- end row -->
 
         <div class="row">
         
			<div class="col-sm-2"></div>
			<div class="col-sm-8"> 
			{{ Form::open(array('class' => "form-horizontal", 'id' => "acceptForm")) }}
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
        

<!-- start row for form open / message -->
<div class="row">
	<div class="col-lg-12"> <!-- begin col -->
		
	
    	<label for="message" class="col-lg-12 control-label">
    	Optional - Please tell us what is important to you in a publisher</label>
	<br />
	</div> <!-- end col -->
</div><!-- end row -->
<!-- end row for message label -->

<!-- start row for message textbox -->
<div class="row">
	
	<div class="col-lg-12"> <!-- begin col -->
  		{{ Form::textarea('str_message', $data['input_old']['str_message'], array('class' => "form-control", 'id' => 'str_message', 'placeholder' => 'message', 'rows' => '3')) }}     
<br /><br />
	</div> <!-- end col -->
</div><!-- end row -->
<!-- end row for message textarea -->

<!-- start row for accept checkbox -->
<div class="row">
	<div class="col-lg-10"> <!-- begin col -->
		Yes, please, I would like to be contacted by interested publishers.
		<br /><br />
	</div> <!-- end col -->
	<div class="col-lg-2"> <!-- begin col -->
     {{ Form::checkbox('bool_accept', '1', ($data['input_old']['bool_accept'] == 1)?true:false, ['id' => 'bool_accept']) }}                    
      <br /><br />
     
	</div> <!-- end col -->
	</div><!-- end row -->
 
 <!-- start row for captcha -->
<!-- 
<div class="row">
	<div class="col-lg-2"> <!-- begin col -->
<!--     	<label for="captcha" class="col-lg-2 control-label">Captcha - required</label>
	<br />
	</div> <!-- end col -->
<!-- 
	<div class="col-lg-10"> <!-- begin col -->
<!-- 
		<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>    
	</div> <!-- end col -->
<!-- 
</div><!-- end row -->
<!-- end row for captcha -->
 
<!-- start row for submit / close form -->
<div class="row">
	<div class="col-lg-6">&nbsp; <!-- begin col -->
	</div>
	<div class="col-lg-6"> <!-- begin col -->
	
		<div style="text-align:center">
    	<!-- 	<button type="reset" class="btn btn-default">Cancel</button>&nbsp;
		
    			<button type="submit" class="btn btn-primary">Find publishers!</button>
		-->
    			{{Form::submit('Find publishers!', array('class' => 'btn btn-md btn-primary-filled btn-form-submit btn-rounded'))}}
				{{ Form::close() }}
    		<br />
		</div>
	</div> <!-- end col -->
</div><!-- end row -->
<!-- end row for submit / close form-->
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




