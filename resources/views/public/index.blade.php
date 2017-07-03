@extends('layouts.master_public')

@section('title', 'Welcome page')

@section('left_content')
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
                        <h3 class="log-title">Try our questionnaire.  It's <span class="text-primary">Free.</span></h3>
<!-- start survey section -->
                        
 						<div id="survey">		    			
						{{ Form::open(array('url' => 'results')) }}
  		
						<div id="qgenre" style="display: none">
							@include('partials._survey_two_cols_one_response', ['data' => $data['dataGenre']])
						</div><!-- end div qgenre -->
   		
  		    			<div id="qschedule" style="display: none">
	  						@include('partials._survey_one_col_one_response', ['data' => $data['dataSchedule']])
						</div><!-- end div qschedule -->  		
 		          	
						<div id="qformat" style="display: none">
	  						@include('partials._survey_one_col_mult_responses', ['data' => $data['dataFormat']])
						</div><!-- end div qformat -->  		
   		
  		    			<div id="qlength" style="display: none">
	  						@include('partials._survey_one_col_one_response', ['data' => $data['dataLength']])
						</div><!-- end div qschedule -->  		
 		          	
						<div id="qexperience" style="display: none">
	  						@include('partials._survey_one_col_one_response', ['data' => $data['dataExperience']])
						</div><!-- end div qformat -->  		
			
						<div id="qcontact_time" style="display: none">
	  						@include('partials._survey_one_col_one_response', ['data' => $data['dataContactTime']])
						</div><!-- end div qcontact_time -->
  		
		    			<div id="qage" style="display: none">
	  						@include('partials._survey_one_col_one_response', ['data' => $data['dataAge']])
						</div><!-- end div qage -->
  		
		    			<div id="qauthor_info" style="display: none">
	  						@include('partials._survey_author_info', ['data' => $data['dataAuthorInfo']])
						</div><!-- end div qauthor_info -->	
  		
		    			<div id="qauthor_info_two" style="display: none">
	  						@include('partials._survey_author_info_two', ['data' => $data['dataAuthorInfoTwo']])
						</div><!-- end div qauthor_info -->	
  		

						{{ Form::close() }}
		
						</div><!-- end div survey -->	
						
<!-- end survey section -->
@endsection	

@section('right_content')

	@if ($data['int_which'] == 1)
		@include('partials._index_one')
	@elseif ($data['int_which'] == 2)
		@include('partials._index_two')
	@elseif ($data['int_which'] == 3)
		@include('partials._index_three')
	@elseif ($data['int_which'] == 2)
		@include('partials.index_one')
	@elseif ($data['int_which'] == 2)
		@include('partials.index_one')
	@elseif ($data['int_which'] == 2)
		@include('partials.index_one')
	@else @include('partials.index_one')
	@endif
                    
@endsection

@section('below_header_content')

<!-- / content -->

<!-- end laravel section content -->
@endsection
                    

@section('page_specific_jquery')
<script>
		var int_tab_show_delay = 1500;
		$(document).ready(function() {
			showTab("qgenre");

//start validation functions
			$('.IsInteger').keypress(function (e) {
    			var charCode = (e.which) ? e.which : e.keyCode;
   				if (charCode > 31
    			&& (charCode < 48 || charCode > 57))
   				{
        			$(".error_msg").text('please enter a number');
   				}
   				else
   				{
        			$(".error_msg").text('');
   				}
   				
			});

			$('.IsEmail').blur(function (e) {
			    var validEmail = false;
			    var email = this.value;
			    if (email.length > 0) {
			        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			        validEmail = regex.test(email);
			    }
			    if (!validEmail)
   				{
        			$(".error_msg").text('please enter a valid email address');
   				}
   				else
   				{
        			$(".error_msg").text('');
				}
			});

			// if whole phone is one input
			$('.IsPhoneNumber').keyup(function (e) {
			    var numbers = this.value.replace(/\D/g, ''),
			    char = { 0: '(', 3: ') ', 6: ' - ' };
			    this.value = '';
			    for (var i = 0; i < numbers.length; i++) {
			        this.value += (char[i] || '') + numbers[i];
			    }
			})
// end validation functions

// control telephone entry
			$("#str_telephone_ac").keyup(function(){
				// soft validate here
				var max = $(this).attr("maxlength");
  				var len = $(this).val().length;
  				if (len >= max) 
  	  			{
    				$('#str_telephone_two').focus();
  				}
			}); // end on str_telephone_ac keyup

			$("#str_telephone_two").keyup(function(){
				// soft validate here
				var max = 3;
  				var len = $(this).val().length;
  				if (len >= max) 
  	  			{
    				$('#str_telephone_three').focus();
  				}
			}); // end on str_telephone_ac keyup
// end control telehone entry


// begin events
			$('input:radio[name=genre]').change(function(){
				doOnShowValidateIfNext('genre', true);
			}); 

			$('#show_genre_next').click(function(){
				doOnShowValidateIfNext('genre', true);
			});
			
			$('input:radio[name=schedule]').change(function(){
				doOnShowValidateIfNext('schedule', true);
			}); 

			$('#show_schedule_next').click(function(){
				doOnShowValidateIfNext('schedule', true);
			});

			$('#show_format_next').click(function(){
				doOnShowNoValidate('format', true);
			});
			
			$('input:radio[name=length]').change(function(){
				doOnShowValidateIfNext('length', true);
			}); 

			$('#show_length_next').click(function(){
				doOnShowValidateIfNext('length', true);
			});
			
			$('input:radio[name=experience]').change(function(){
				doOnShowValidateIfNext('experience', true);
			}); 

			$('#show_experience_next').click(function(){
				doOnShowValidateIfNext('experience', true);
			});
			
			$('input:radio[name=contact_time]').change(function(){
				doOnShowValidateIfNext('contact_time', true);
			}); 

			$('#show_contact_time_next').click(function(){
				doOnShowValidateIfNext('contact_time', true);
			});
			
			$('input:radio[name=age]').change(function(){
				doOnShowValidateIfNext('age', true);
			});
			
			$('#show_age_next').click(function(){
				doOnShowValidateIfNext('age', true);
			});

			$('#show_author_info_next').click(function(){
				proceed('author_info', true);
			});
			

			$('#show_schedule_prev').click(function(){
				doOnShowValidateIfNext('schedule', false);
			});


			$('#show_format_prev').click(function(){
				doOnShowValidateIfNext('format', false);
			});

			$('#show_length_prev').click(function(){
				doOnShowValidateIfNext('length', false);
			});

			$('#show_experience_prev').click(function(){
				doOnShowValidateIfNext('experience', false);
			});
			

			$('#show_contact_time_prev').click(function(){
				doOnShowValidateIfNext('contact_time', false);
			});


			$('#show_age_prev').click(function(){
				doOnShowValidateIfNext('age', false);
			});

			$('#show_author_info_prev').click(function(){
				proceed('author_info', false);
			});
			

			$('#show_author_info_two_prev').click(function(){
				proceed('author_info_two', false);
			});
			
// end events			
					
	}); // end document ready function

	function proceed(item_name, next)
	{		
		if (item_name == "genre")
			showTab("qschedule");

		if (item_name == "schedule")
		{
			if (next)
			{
				showTab("qformat")
			}
			else
			{
				showTab("qgenre");
			}
		}
		
		if (item_name == "format")
		{
			if (next)
			{
				showTab("qlength")
			}
			else
			{
				showTab("qschedule");
			}
		}

		if (item_name == "length")
		{
			if (next)
			{
				showTab("qexperience")
			}
			else
			{
				showTab("qformat");
			}
		}

		if (item_name == "experience")
		{
			if (next)
			{
				showTab("qcontact_time")
			}
			else
			{
				showTab("qlength");
			}
		}
		
		if (item_name == "contact_time")
		{
			if (next)
			{
				showTab("qage")
			}
			else
			{
				showTab("qexperience");
			}
		}
		
		if (item_name == "age")
		{
			if (next)
			{
				showTab("qauthor_info")
			}
			else
			{
				showTab("qcontact_time");
			}
		}
		
		if (item_name == "author_info")
		{
			if (next)
			{
				showTab("qauthor_info_two")
			}
			else
			{
				showTab("qage");
			}
		}
		
		if (item_name == "author_info_two")
			showTab("qauthor_info");		
	}
	
	function validateInt(val_val)
	{
		var numberReg =  /^[0-9]+$/;
		if ((val_val == null) || (val_val == ''))
		{
			return false;
		}	
		if(!numberReg.test(val_val))
		{
			return false;
		}
		return true;
	}
		
	function validateThenProceed(item_name, item_value, next)
	{
		var validated = false;
		validated = validateInt(item_value);
		if (validated)
		{									
			$('.error_msg').text('');
			proceed(item_name, next);
		}
		else
		{
			$('.error_msg').text('Please enter a valid choice');
		}	
	}
	

	// begin do on show

		function doOnShowValidateIfNext(iname, next)
		{
			var item_name = iname;
			var item_value = ($('#' + iname + ':checked').val());
			if (next)
				validateThenProceed(item_name, item_value, next);
			else
				proceed(item_name, next);
		}


		function doOnShowNoValidate(iname)
		{
//			var item_name = iname;
//			var item_value = ($('#' + iname + ':checked').val())
			proceed(iname, 'false');
		}
		
	// end do on show
	
	function hide_all()
	{
	    $('#qgenre').hide();
		$('#qschedule').hide();
	    $('#qformat').hide();
		$('#qlength').hide();
	    $('#qexperience').hide();
	    $('#qcontact_time').hide();
	    $('#qage').hide();
	    $('#qauthor_info').hide();
	    $('#qauthor_info_two').hide();
	}	

		function showTab(tabName)
		{
			hide_all();
		    $('#' + tabName).show(int_tab_show_delay);
		}
	</script>

@endsection

