@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
/*
		$(document).ready(function() {
			
			console.log('doc ready called');
			showGenre();

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
				doOnShowGenre(true);
			}); 

			$('#show_genre_next').click(function(){
				doOnShowGenre(true);
			});
			
			$('input:radio[name=schedule]').change(function(){
				doOnShowSchedule(true);
			}); 

			$('#show_schedule_next').click(function(){
				doOnShowSchedule(true);
			});

			$('input:radio[name=format]').change(function(){
				doOnShowFormat(true);
			}); 

			$('#show_format_next').click(function(){
				doOnShowFormat(true);
			});
						
			$('input:radio[name=contact_time]').change(function(){
				doOnShowContactTime(true);
			}); 

			$('#show_contact_time_next').click(function(){
				doOnShowContactTime(true);
			});
			
			$('input:radio[name=age]').change(function(){
				doOnShowAge(true);
			});
			
			$('#show_age_next').click(function(){
				doOnShowAge(true);
			});

			$('#show_author_info_next').click(function(){
				doOnShowAuthorInfo(true);
			});
			

			$('#show_schedule_prev').click(function(){
				doOnShowSchedule(false);
			});


			$('#show_format_prev').click(function(){
				doOnShowFormat(false);
			});
			

			$('#show_contact_time_prev').click(function(){
				doOnShowContactTime(false);
			});


			$('#show_age_prev').click(function(){
				doOnShowAge(false);
			});

			$('#show_author_info_prev').click(function(){
				doOnShowAuthorInfo(false);
			});
			

			$('#show_author_info_two_prev').click(function(){
				doOnShowAuthorInfoTwo(false);
			});
			
// end events			
					
	}); // end document ready function

	function proceed(item_name, next)
	{
//		hide_all();
		
		if (item_name == "genre")
			showSchedule();
		if (item_name == "schedule")
		{
			if (next)
			{
				showFormat()
			}
			else
			{
				showGenre();
			}
		}
		if (item_name == "format")
		{
			if (next)
			{
				showContactTime()
			}
			else
			{
				showSchedule();
			}
		}
		if (item_name == "contact_time")
		{
			if (next)
			{
				showAge()
			}
			else
			{
				showFormat();
			}
		}
		if (item_name == "age")
		{
			if (next)
			{
				showAuthorInfo()
			}
			else
			{
				showContactTime();
			}
		}
		if (item_name == "author_info")
		{
			if (next)
			{
				showAuthorInfoTwo()
			}
			else
			{
				showAge();
			}
		}
		if (item_name == "author_info_two")
			showAuthorInfo();		
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
//		$('.error_msg').text('');
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
		function doOnShowGenre(next)
		{
			var item_name = "genre";
			var item_value = ($('#genre:checked').val());
			$('.error_msg').text('');
			validateThenProceed(item_name, item_value, next);
		}


		function doOnShowSchedule(next)
		{
			var item_name = "schedule";
			var item_value = ($('#schedule:checked').val());
			$('.error_msg').text('');
			if (next)
				validateThenProceed(item_name, item_value, next);
			else
				proceed(item_name, next);
		}

		function doOnShowFormat(next)
		{
			var item_name = "format";
//			var item_value = ($('#format:checked').val());
//			var next = true;
	// validation is different, and potential multiple responses
	// for now, this screen is not validated
//			validateThenProceed(item_name, item_value, next);
			$('.error_msg').text('');
			proceed(item_name, next);

		}


		function doOnShowContactTime(next)
		{
			var item_name = "contact_time";
			var item_value = ($('#contact_time:checked').val());
			if (next)
				validateThenProceed(item_name, item_value, next);
			else
				proceed(item_name, next);
		}


		function doOnShowAge(next)
		{
			console.log('do on show age called');
			var item_name = "age";
			var item_value = ($('#age:checked').val());
			if (next)
				validateThenProceed(item_name, item_value, next);
			else
				proceed(item_name, next);
		}

		
		function doOnShowAuthorInfo(next)
		{
			console.log('do on show author info called');
			var item_name = "author_info";
//			var item_value = ($('#author_info:checked').val());
			// validation is different, as many responses
			// for now, this screen is not validated
//					validateThenProceed(item_name, item_value, next);
					$('.error_msg').text('');
					proceed(item_name, next);
				}


		function doOnShowAuthorInfoTwo(next)
		{
			var item_name = "author_info_two";
//			var item_value = ($('#author_info_two:checked').val());
			// validation is different, as many responses
			// for now, this screen is not validated
//			validateThenProceed(item_name, item_value, next);
			$('.error_msg').text('');
			proceed(item_name, next);
		}
			
	// end do on show
	
	function hide_all()
	{
	    $('#qgenre').hide();
		$('#qschedule').hide();
	    $('#qformat').hide();
	    $('#qcontact_time').hide();
	    $('#qage').hide();
	    $('#qauthor_info').hide();
	    $('#qauthor_info_two').hide();
	}	
	
		function showGenre()
		{
			hide_all();
		    $('#qgenre').show(500);
		}

		function showSchedule()
		{
			hide_all();
			$('#qschedule').show(500);
		}

		function showFormat()
		{
			hide_all();
		    $('#qformat').show(500);		    
		}

		function showContactTime()
		{
			hide_all();
		    $('#qcontact_time').show(500);
		}

		function showAge()
		{
			hide_all();
		    $('#qage').show(500);
		}
		
		function showAuthorInfo()
		{
			hide_all();
		    $('#qauthor_info').show(500);
		}

		function showAuthorInfoTwo()
		{
			hide_all();
		    $('#qauthor_info_two').show(500);
		}
*/	    
	    </script>

@endsection

@section('content')
<!-- /app/resources/views/public/index.blade.php -->
    
 
<div class="row">
	<div class="col-lg-6"> <!-- begin left side column -->
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
  		

			{!! Form::close() !!}
		
		</div><!-- end div survey -->	
	</div> <!-- end left side column -->
	<div class="col-lg-6"> xyz right side, level 1<br>
		temporarily, lot of random text to fill space<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>adfdsaf a df asdf asdf asdf asdf asdf asdf asf asdf  asdf asdf asdf sadf asdf asdf asdf sadf  sadfasdfasdfa sdfasdf asdf asdf asdf asdf asdf asdf asdf asdf asdfasdf asdfasdf asdf asdf asdf sdf sdfasdfasdfasdfsshdfhdfhdfhg dgh dgfh dfghdfgh  dfg hd dfgh dfgthfgh 
	</div>
</div><!-- end row -->
     
@endsection




