@extends('layouts.master_public_plain')

@section('title', 'Contact form')
@section('page_specific_jquery')
<script>
$(document).ready(function(){
    $("#contactForm").submit(function(){
        console.log("recaptcha form Submitted");
    });
});
</script>

@endsection

@section('content')

<!-- resources/views/public/contact.blade.php -->

	

          	{!! Form::open(array('class' => "form-horizontal", 'id' => "contactForm")) !!}
  			{!! Form::hidden('test_form', 'test value') !!}
 
         
    
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
                
			<div class="col-sm-2"></div>
			<div class="col-sm-8"> 
				<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>                    </div>
			
   			</div> 		
			<div class="col-sm-2"> </div>
		</div><!-- end row -->
 
 
         
         <div class="row">
                
			<div class="col-sm-2"></div>
			<div class="col-sm-8"> 
                      <button type="reset" class="btn btn-default">Cancel</button>&nbsp;
                      <button type="submit" class="btn btn-primary">Submit</button>
			</div>			
    		
			<div class="col-sm-2"> </div>
		</div><!-- end row -->
                                                
               {!! Form::close() !!}
	
	
	
	
@endsection	