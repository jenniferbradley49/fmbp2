@extends('layouts.master_public')

@section('title', 'Welcome page')
@section('page_specific_jquery')


<script>
		$(document).ready(function() {
//alert('jquery works!');			
//			showGenre();
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
		    $('#' + tabName).show(500);
		}
	</script>

@endsection

@section('content')
<!-- /app/resources/views/public/index.blade.php -->
    
<!-- start content -->
 <!--  these divs are in the master doc, should be included in content, in comments, for continuity
 <header id="header-5" class="light-header">
    <div class="container">
 -->
        <div class="header-content">
            <div class="row">
                <div class="col-sm-6">

					<div id="contact-form-1">
					<h3 class="log-title">Try our survey - It is <span class="text-primary">Free.</span></h3>
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
					</div><!-- end div contact-form-1 -->	
						

                    
                </div><!-- / col-sm-6 -->
                <div class="col-sm-6 header-content-details">
                    <h3 class="header-brand">This is THE<span class="text-primary">ONE</span> </h3>
                    <h3>The Best Marketing / Landing Page Template</h3>
                    <p>Qusinque rhoncus tempus sem sed ornare. Aenean viverra ornare dui nec mollis. Vestibulum in dui sed velit consequat. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                    <p>
                        <a href="#features" class="btn btn-md btn-dark btn-rounded page-scroll">Learn More</a>
                        <a href="#pricing" class="btn btn-md btn-primary-filled btn-rounded page-scroll">Our Pricing</a>
                    </p>
                </div><!-- / col-sm-6 -->
            </div><!-- / row -->
        </div><!-- / header-content -->
    </div><!-- / container -->
</header>
<!-- / header -->

<!-- content -->

<!-- features section 3col -->
<section id="features">
    <div class="container">
        <div class="page-header text-center">
            <h2>Features</h2>
        </div>
        <div class="row">
            <!-- feature-block -->
            <div class="col-sm-4 feature-left">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-laptop-phone rounded"></i>
                    </div>
                    <h4>Responsive</h4>
                    <p>Quisque sit amet libero purus. Nulla a dignissim quam.</p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-sm-4 feature-left">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-eye rounded"></i>
                    </div>
                    <h4>Retina Ready</h4>
                    <p>Quisque sit amet libero purus. Nulla a dignissim quam.</p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-sm-4 feature-left">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-cog rounded"></i>
                    </div>
                    <h4>Easy to Use</h4>
                    <p>Quisque sit amet libero purus. Nulla a dignissim quam. </p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-sm-4 feature-left">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-pencil rounded"></i>
                    </div>
                    <h4>Easy to Edit</h4>
                    <p>Quisque sit amet libero purus. Nulla a dignissim quam.</p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-sm-4 feature-left">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-book rounded"></i>
                    </div>
                    <h4>Well Documented</h4>
                    <p>Quisque sit amet libero purus. Nulla a dignissim quam.</p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-sm-4 feature-left">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-envelope rounded"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Quisque sit amet libero purus. Nulla a dignissim quam.</p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / feature-block -->
        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / features section 3col -->

<!-- how it works section 3col -->
<section id="how" class="style-2">
    <div class="container">
        <div class="page-header text-center">
            <h2>How it Works</h2>
        </div>
        <div class="row">
            <!-- hiw-content -->
            <div class="col-md-6 hiw-content">
                <div class="row">

                    <!-- how-block -->
                    <div class="col-sm-6 hiw next-indicator">
                        <div class="how block">
                            <div class="how-icon">
                                <span class="step-badge rounded">1</span>
                                <i class="lnr lnr-enter rounded"></i>
                            </div>
                            <h4>Register</h4>
                        </div>
                    </div><!-- / col-sm-4 -->
                    <!-- / how-block -->

                    <!-- how-block -->
                    <div class="col-sm-6 hiw">
                        <div class="how block">
                            <div class="how-icon">
                                <span class="step-badge rounded">2</span>
                                <i class="lnr lnr-eye rounded"></i>
                            </div>
                            <h4>Select</h4>
                        </div>
                    </div><!-- / col-sm-4 -->
                    <!-- / how-block -->
                </div><!-- / row -->

                <div class="row">

                    <!-- how-block -->
                    <div class="col-sm-6 hiw next-indicator">
                        <div class="how block">
                            <div class="how-icon">
                                <span class="step-badge rounded">3</span>
                                <i class="lnr lnr-thumbs-up rounded"></i>
                            </div>
                            <h4>Pay</h4>
                        </div>
                    </div><!-- / col-sm-4 -->
                    <!-- / how-block -->

                    <!-- how-block -->
                    <div class="col-sm-4 hiw">
                        <div class="how block">
                            <div class="how-icon">
                                <span class="step-badge rounded">4</span>
                                <i class="lnr lnr-cloud-download rounded"></i>
                            </div>
                            <h4>Download</h4>
                        </div>
                    </div><!-- / col-sm-4 -->
                    <!-- / how-block -->
                </div><!-- / row -->
            </div><!-- / col-md-6 -->
            <!-- hiw-content -->

            <!-- hiw video -->
            <div class="col-md-6 hiw-video">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://player.vimeo.com/video/105656015?title=0&byline=0&portrait=0"></iframe>
                </div>
            </div><!-- / hiw-video -->
            <!-- / hiw video -->
        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / how it works section 3col -->

<!-- pricing tables -->
<section id="pricing">
    <div class="container">
        <!-- pricing table 3col -->
        <div class="row">
            <!-- pricing-table -->
            <div class="col-sm-4">
                <div class="pricing-table">
                    <div class="pricing-table-title">
                        <h5 class="pricing-title">Single Applications</h5>
                    </div>
                    <div class="pricing-table-price">
                        <p>
                            <span class="pricing-currency">$</span>
                            <span class="pricing-price">15</span>
                            <span class="pricing-period">/ one-time</span>
                        </p>
                    </div>
                    <div class="pricing-table-content">
                        <ul>
                            <li><strong>Single Installation</strong></li>
                            <li>Free Lifetime Updates</li>
                            <li>24/7 Support</li>
                            <li>SASS Files Included</li>
                            <li>Well Documented</li>
                        </ul>
                        <div class="pricing-table-button">
                            <a href="#" class="btn btn-primary-filled btn-rounded">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / pricing-table -->

            <!-- pricing-table -->
            <div class="col-sm-4">
                <div class="featured pricing-table">
                    <div class="pricing-table-title">
                        <h5 class="pricing-title">Multiple Applications</h5>
                    </div>
                    <div class="pricing-table-price">
                        <p>
                            <span class="pricing-currency">$</span>
                            <span class="pricing-price">40</span>
                            <span class="pricing-period">/ one-time</span>
                        </p>
                    </div>
                    <div class="pricing-table-content">
                        <ul>
                            <li><strong>Multiple Installations</strong></li>
                            <li>Free Lifetime Updates</li>
                            <li>24/7 Support</li>
                            <li>SASS Files Included</li>
                            <li>Well Documented</li>
                        </ul>
                        <div class="pricing-table-button">
                            <a href="#" class="btn btn-primary-filled btn-rounded">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / pricing-table -->

            <!-- pricing-table -->
            <div class="col-sm-4">
                <div class="pricing-table">
                    <div class="pricing-table-title">
                        <h5 class="pricing-title">Reseller License</h5>
                    </div>
                    <div class="pricing-table-price">
                        <p>
                            <span class="pricing-currency">$</span>
                            <span class="pricing-price">750</span>
                            <span class="pricing-period">/ one-time</span>
                        </p>
                    </div>
                    <div class="pricing-table-content">
                        <ul>
                            <li><strong>Reseller License</strong></li>
                            <li>Free Lifetime Updates</li>
                            <li>24/7 Support</li>
                            <li>SASS Files Included</li>
                            <li>Well Documented</li>
                        </ul>
                        <div class="pricing-table-button">
                            <a href="#" class="btn btn-primary-filled btn-rounded">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / pricing-table -->
        </div><!-- / row -->
        <!-- / pricing table 3col -->
    </div><!-- / container -->
</section>
<!-- / pricing tables -->

<!-- team section 3col -->
<section id="team" class="style-2">
    <div class="container">
        <div class="page-header text-center">
            <h2>The Team</h2>
        </div>
        <div class="row">
            <!-- team-block -->
            <div class="col-sm-4">
                <div class="team block text-center">
                    <img src="images/700x700.jpg" alt="" class="rounded">
                    <h5>John Doe</h5>
                    <p class="team-role">Founder</p>
                    <p class="social center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / team-block -->

            <!-- team-block -->
            <div class="col-sm-4">
                <div class="team block text-center">
                    <img src="images/700x700.jpg" alt="" class="rounded">
                    <h5>Johana Doe</h5>
                    <p class="team-role">Designer</p>
                    <p class="social center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / team-block -->

            <!-- team-block -->
            <div class="col-sm-4">
                <div class="team block text-center">
                    <img src="images/700x700.jpg" alt="" class="rounded">
                    <h5>James Doe</h5>
                    <p class="team-role">Web Developer</p>
                    <p class="social center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </p>
                </div>
            </div><!-- / col-sm-4 -->
            <!-- / team-block -->
        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / team section 3col -->

<!-- images carousel -->
<div id="clients" class="primary-background">
    <div class="container">
        <div id="clients-carousel" class="owl-carousel">
            <div class="item"><img src="images/client-light1.png" alt=""></div>
            <div class="item"><img src="images/client-light2.png" alt=""></div>
            <div class="item"><img src="images/client-light3.png" alt=""></div>
            <div class="item"><img src="images/client-light4.png" alt=""></div>
            <div class="item"><img src="images/client-light5.png" alt=""></div>
            <div class="item"><img src="images/client-light6.png" alt=""></div>
            <div class="item"><img src="images/client-light7.png" alt=""></div>
            <div class="item"><img src="images/client-light8.png" alt=""></div>
            <div class="item"><img src="images/client-light9.png" alt=""></div>
            <div class="item"><img src="images/client-light10.png" alt=""></div>
            <div class="item"><img src="images/client-light11.png" alt=""></div>
            <div class="item"><img src="images/client-light12.png" alt=""></div>
        </div> 
    </div><!-- / container -->
</div>
<!-- / images carousel -->

<section id="newsletter" class="light no-icons">
    <div class="container">
        <div class="page-header text-center">
            <h2>Subscribe for <span class="text-primary">free</span> Updates.</h2>
        </div>
        <div class="input-group">
            <input type="text" class="form-control rounded" placeholder="Email">
            <span class="input-group-btn">
                <button class="btn btn-md btn-primary-filled btn-left btn-newsletter btn-rounded inside" type="button">Subscribe</button>
            </span>
        </div><!-- /input-group -->
    </div><!-- / container -->
</section><!-- / newsletter -->

<!-- / content -->

@endsection




