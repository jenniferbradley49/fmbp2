@extends('layouts.master_public')

@section('title', 'Contact page - success')
@section('page_specific_jquery')
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
	<div class="col-sm-2"><br><br><br><br><br><br> </div>
	<div class="col-sm-8"> 
		We sent the following information:
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     

<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Email
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['email'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     

<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Name
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['first_name'] }} &nbsp;{{ $data['arr_request']['last_name'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     

<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Telephone
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['telephone'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     
     
<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Message
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['message'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     
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
<p><span style="text-align:center">{{ Html::link("/", 'Return to homepage') }}</span>

@endsection

@section('below_header_content')

<!-- / content -->

<!-- end laravel section content -->
@endsection

