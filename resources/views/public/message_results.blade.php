@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
		$(document).ready(function() {
			
		}); // end document ready function

		
	    </script>

@endsection

@section('left_content')
<!-- /app/resources/views/public/message_results.blade.php -->
    
 
<div class="row">
	<div class="col-lg-2"> <!-- begin col -->
	&nbsp;
	</div> <!-- end col -->
	<div class="col-lg-12"> <!-- begin col -->
<br /><br /><br />
Thank you for sending information to our publisher search service.  
We will forward your information to publishers.  If publishers consider 
your information suitable for their goals, they will contact you shortly.
<br /><br /><br />
	</div> <!-- end col -->
	<div class="col-lg-2"> <!-- begin col -->
	&nbsp;
	</div> <!-- end col -->
</div><!-- end row -->


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
		<p>&nbsp;</p>
@endsection

@section('below_header_content')

<!-- / content -->

<!-- end laravel section content -->
@endsection



