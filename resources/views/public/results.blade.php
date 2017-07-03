@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
		$(document).ready(function() {
			
		}); // end document ready function

		
	    </script>

@endsection

@section('content')
<!-- /app/resources/views/public/results.blade.php -->
    
 <!-- moved to next page 
<div class="row">
	<div class="col-lg-12"> <!-- begin col -->
	<!--  
<br /><br />Thank you for sending information to our publisher search service.  
We will forward your information to publishers.  If publishers consider 
your information suitable for their goals, they will contact you shortly.
<br /><br /><br /><br />
	</div> <!-- end col -->
	<!--  
</div><!-- end row -->

<!-- start row for form open / message -->
<div class="row">
	<div class="col-lg-6"> <!-- begin col -->
		{{ Form::open(array('class' => "form-horizontal", 'url' => 'accept', 'id' => "acceptForm")) }}
	
    	<label for="message" class="col-lg-6 control-label">Optional - Please tell us what is important to you in a publisher</label>
	<br />
	</div> <!-- end col -->

	<div class="col-lg-6"> <!-- begin col -->
  		{{ Form::textarea('str_message', $data['input_old']['str_message'], array('class' => "form-control", 'id' => 'str_message', 'placeholder' => 'message', 'rows' => '3', 'cols' => '40')) }}     
	</div> <!-- end col -->
</div><!-- end row -->
<!-- end row for message -->

<!-- start row for accept checkbox -->
<div class="row">
	<div class="col-lg-6"> <!-- begin col -->
		Yes, please, I would like to be contacted by interested pubishers.
		<br />
	</div> <!-- end col -->
	<div class="col-lg-6"> <!-- begin col -->
     {{ Form::checkbox('bool_accept', '1', ($data['input_old']['bool_accept'] == 1)?true:false, ['id' => 'bool_accept']) }}                    
      <br />
     
	</div> <!-- end col -->
	</div><!-- end row -->
 
 <!-- start row for captcha -->
<div class="row">
	<div class="col-lg-2"> <!-- begin col -->
    	<label for="captcha" class="col-lg-2 control-label">Captcha - required</label>
	<br />
	</div> <!-- end col -->

	<div class="col-lg-10"> <!-- begin col -->
 		<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>    
	</div> <!-- end col -->
</div><!-- end row -->
<!-- end row for captcha -->
 
<!-- start row for submit / close form -->
<div class="row">
	<div class="col-lg-12"> <!-- begin col -->
		<div style="text-align:center">
    		<button type="reset" class="btn btn-default">Cancel</button>&nbsp;
        	<button type="submit" class="btn btn-primary">Find publishers!</button>
			<br />
		</div>
	</div> <!-- end col -->
</div><!-- end row -->
<!-- end row for submit / close form-->

@endsection




