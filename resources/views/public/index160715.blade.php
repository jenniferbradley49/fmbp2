@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
		$(document).ready(function() {
			
			console.log('doc ready called');
			showGenre();
//			$('#q1').hide();
//			$('#q2').hide();
//			$('#q1').show(2000);
//			exec_jq_ajax_get('genre');

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
			
			function validateInt(val_val)
			{
				var numberReg =  /^[0-9]+$/;
//				alert ('in validateInt, val_val =' + val_val);
				if ((val_val == null) || (val_val == ''))
				{
//					alert('in validate, val_val empty');
					return false;
				}	
				if(!numberReg.test(val_val))
				{
//					alert('in validate, val val failed regex');
					return false;
				}
//				alert('in validate, going to return true');
				return true;
			}
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

// do on  show
	function proceed(item_name, next)
	{
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
				showAddressInfo()
			}
			else
			{
				showFormat();
			}
		}
		if (item_name == "address_info")
		{
			if (next)
			{
				showAddress_info_two()
			}
			else
			{
				showContactTime();
			}
		}
		
	}

	function validateThenProceed(item_name, item_value, next)
	{
		var validated = false;
		validated = validateInt(item_value);
		if (validated)
		{									
//			propagate_csrf_code();
//			exec_jq_ajax(item_name, item_value, 'q1', 'q2');
			$('.error_msg').text('');
			proceed(item_name, next);
		}
		else
		{
			$('.error_msg').text('Please enter a valid choice');
		}	
	
	}


	function doOnShowGenre(next)
	{
		var item_name = "genre";
		var item_value = ($('#genre:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}


	function doOnShowSchedule(next)
	{
//		alert ('doOnShowSchedule called');
		var item_name = "schedule";
		var item_value = ($('#schedule:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}

	function doOnShowFormat(next)
	{
		var item_name = "format";
		var item_value = ($('#format:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}


	function doOnShowContactTime(next)
	{
		var item_name = "contact_time";
		var item_value = ($('#contact_time:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}


	function doOnShowAge(next)
	{
		var item_name = "age";
		var item_value = ($('#age:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}

	
	function doOnShowAuthorInfo(next)
	{
		var item_name = "author_info";
		var item_value = ($('#author_info:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}


	function doOnShowAuthorInfoTwo(next)
	{
		var item_name = "author_info_two";
		var item_value = ($('#author_info_two:checked').val());
//		var next = true;
		validateThenProceed(item_name, item_value, next);
	}

	
/*	
	function doOnShowScheduleNext()
	{
		var item_name = "schedule";
		var item_value = ($('#schedule:checked').val());
		var validated = false;
		validated = validateInt(item_value);
		if (validated)
		{									
//			propagate_csrf_code();
//			exec_jq_ajax(item_name, item_value, 'q1', 'q2');
			$('.error_msg').text('');
			showFormat();
		}
		else
		{
			$('.error_msg').text('Please enter a valid choice');
		}	
	}

	function doOnFormatNext()
	{
		var item_name = "format";
		var item_value = ($('#genre:checked').val());
		var validated = false;
		validated = validateInt(item_value);
		if (validated)
		{									
//			propagate_csrf_code();
//			exec_jq_ajax(item_name, item_value, 'q1', 'q2');
			$('.error_msg').text('');
			showSchedule();
		}
		else
		{
			$('.error_msg').text('Please enter a valid choice');
		}	
	}
*/	
// end do on show

// begin events
			$('input:radio[name=genre]').change(function(){
				doOnShowGenre(true);
			}); // end on q1 change

			$('#show_genre_next').click(function(){
				doOnShowGenre(true);
			});
			

			$('input:radio[name=schedule]').change(function(){
				doOnShowSchedule(true);
			}); // end on q1 change

			$('#show_schedule_next').click(function(){
				doOnShowSchedule(true);
			});

			$('input:radio[name=format]').change(function(){
				doOnShowFormat(true);
			}); // end on q1 change

			$('#show_format_next').click(function(){
				doOnShowFormat(true);
			});
			
			
			$('input:radio[name=contact_time]').change(function(){
				doOnShowContactTime(true);
			}); // end on q1 change

			$('#show_contact_time_next').click(function(){
				doOnShowContactTime(true);
			});

			$('#show_age_next').click(function(){
				doOnShowContactTime(true);
			});
			/*			
			$('input:radio[name=address_info]').change(function(){
				doOnShowAddressInfo(true);
			}); // end on q1 change
*/
			$('#show_AddressInfo_next').click(function(){
				doOnShowAddressInfo(true);
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
				doOnShowContactTime(false);
			});

			$('#show_AddressInfo_prev').click(function(){
				doOnShowAddressInfo(false);
			});
			

			$('#show_AddressInfoTwo_prev').click(function(){
				doOnShowAddressInfoTwo(false);
			});
			
// end events			
			
/*			
			$('.show_schedule').click(function(){
//			    showSchedule();
console.log('show schedule called');
				var validated = false;
				validated = validateInt(item_value);
				if (validated)
				{									
//					propagate_csrf_code();
					exec_jq_ajax(item_name, item_value, 'q1', 'q2');
					$('.error_msg').text('');
					showSchedule();
				}
				else
				{
					$('error_msg').text('<span class="error">Please enter a valid choice</span>');
				}
			});
			

			$('.show_format').click(function(){
			    showFormat();
			});
			

			$('.show_contact_time').click(function(){
			    showContactTime();
			});

			$('.show_author_info').click(function(){
			    showAuthorInfo();
			});
					

			$('.show_author_info_two').click(function(){
//				alert('show author info two called');
//				console.log('author ifnof two called');
			    showAuthorInfoTwo();
			    
			});
*/					
			
	}); // end document ready function

		function showGenre()
		{
		    $('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		    $('#qgenre').show(500);
		}


		function showSchedule()
		{
			console.log('showSchedule called');
			$('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		   	$('#qschedule').show(500);
		}


		function showFormat()
		{
			console.log('showFormat called');
		    $('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		    console.log('in show format, show reached');
//		    $('#qforma').show(500);
		    console.log('in show format, after show reached');
		    
		}

		function showContactTime()
		{
		    $('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		    $('#qcontact_time').show(500);
		}

		function showAge()
		{
		    $('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		    $('#qage').show(500);
		}
		
		

		function showAuthorInfo()
		{
		    $('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		    $('#qauthor_info').show(500);
		}

		function showAuthorInfoTwo()
		{
		    $('#qgenre').hide();
			$('#qschedule').hide();
		    $('#qformat').hide();
		    $('#qcontact_time').hide();
		    $('#qage').hide();
		    $('#qauthor_info').hide();
		    $('#qauthor_info_two').hide();
		    $('#qauthor_info_two').show(500);
		}
		
		
		
		/*
		function propagate_csrf_code()
	    {
	        var csrf_token = $("input[name=_token]").val();

	// laravel imposes csrf protection - the ajax setup 
	// sends the csrf token in the header to remove the 
	// 500 internal service error 
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': csrf_token
				}
			});
	    }     // end function propagate_csrf_code  
*/
/*
		function exec_jq_ajax(item_name, item_value, q_current, q_next)
	    {
	        jQuery.ajax({
	            url: "/ajax/set_item",
	            type: "POST",
//	            async: false,
	            data: {   
	                "item_name":item_name,
	                "item_value":item_value,
					},
	            dataType : "json",
	            beforeSend: function () {
	                console.log('AJAX sent');
	            },               
	            success: function( data ) 
	            {
//		            data = JSON.parse(data);
		            console.log(data);
		            console.log(typeof(data));
		            console.log(data.response);
		            console.log(data['response']);
//		            if (data. == 1)
//		            {
	    				$('#' + q_current).hide();
	    				$('#' + q_next).show(2000);
//		            }
				},
	            error: function( xhr, status, errorThrown ) {
	                console.log("Ajax error");
	                console.log(errorThrown);
	            }
	        });  // end jquery ajax						
	    
	    }  // end funtion exec_jq_ajax
*/
	    
	    </script>

@endsection

@section('content')
<!-- /app/resources/views/public/index.blade.php -->
    
 
<div class="row">
	<div class="col-lg-6"> <!-- begin left side column -->
		<div id="survey">
		    {{ Form::open(array('class' => "form-horizontal", 'id' => "contactForm")) }}
  		
			<div id="qgenre">
			@include('partials._survey_two_cols_one_response', ['data' => $data['dataGenre']])
			</div><!-- end div qgenre -->
  		
		    <div id="qschedule">
	  		@include('partials._survey_one_col_one_response', ['data' => $data['dataSchedule']])
			</div><!-- end div qschedule -->  		
		          	
			<div id="qformat">
	  		@include('partials._survey_one_col_mult_responses', ['data' => $data['dataFormat']])
			</div><!-- end div qformat -->  		
		          	
			<div id="qcontact_time">
	  		@include('partials._survey_one_col_one_response', ['data' => $data['dataContactTime']])
			</div><!-- end div qcontact_time -->
  		
		    <div id="qage">
	  		@include('partials._survey_one_col_one_response', ['data' => $data['dataAge']])
			</div><!-- end div qage -->
  		
		    <div id="qauthor_info">
	  		@include('partials._survey_author_info', ['data' => $data['dataAuthorInfo']])
			</div><!-- end div qauthor_info -->	
  		
		    <div id="qauthor_info_two">
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
	</div><!-- end right side -->
</div><!-- end row -->
     
@endsection




