<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="find the best publisher>
<meta name="keywords" content="find publisher, agent, book" />
<meta name="author" content="findbestpublisher.com">

<!-- favicon -->
<link rel="icon" href="{{URL::asset('assets/images/favicon.png')}}">
<!-- page title -->
<title>@yield('title')</title>
<!-- bootstrap css -->
<link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- css -->
<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/animate.css')}}" rel="stylesheet">
<!-- 
<link href="{{URL::asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/css/owl.theme.css')}}" rel="stylesheet">
-->
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700" rel="stylesheet">
<link href="{{URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('assets/fonts/FontAwesome.otf')}}" rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{URL::asset('assets/css/linear-icons.css')}}">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
#header-5 {
  background-image: url("{{URL::asset('assets/images/sunset9_500x332.jpg')}}");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}  

#survey_test {
	position: absolute;
	top: 0 px;
	left: 0 px;
	width: 100%;
	background-color : white;
	z-index: 2;
}

#background-form-1 {
	position: absolute;
	top: 0 px;
	left: 0 px;
	width: 100%;
	height: 300 px;
	background-color: blue;
	z-index: 1;
}

.textwrap {
	float:right;
	margin:10px;
}

.white_background_btn {
	color : white;
	display: none;
	
}

.logo_text_white {
font-size : 24px;
color : white;
}

.logo_text_green {
font-size : 24px;
color: #1fc585;
}

.header-content-details {
  padding: 10px 15px;
}

.fmbp_logo {
	display:none;
}

</style>

</head>

<body>

<div id="top" data-toggle="top"></div>
<!-- header -->
<header id="header-5" class="light-header">
    <div class="container">
        <!-- navbar-1 inverse -->
        <nav class="navbar-1 navbar navbar-inverse nav-w-top-space rounded">
            <div class="container-fluid navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <div class="navbar-text fmbp_logo">
				<span class="logo_text_white">Find</span>
				<span class="logo_text_green">My</span>
				<span class="logo_text_white">Book</span>
				<span class="logo_text_green">Publisher</span>	
				</div>		
        <!--            
                <a class="navbar-brand" href="#"><img src="{{URL::asset('assets/images/light-logo.png')}}" alt="logo"></a>
		-->
            </div><!-- / navbar-header -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <!--  
                    <li><button class="btn btn-primary-filled-nav btn-rounded white_background_btn">&nbsp;&nbsp;White background&nbsp;&nbsp;</button></li>
                 -->
                    <li><a href="home" class="page-scroll">Home</a></li>
                	<li><a href="contact" class="page-scroll">Contact</a></li>
                 <!--     
                    <li><a href="#how" class="page-scroll"><span>How it Works</span></a></li>
                    <li><a href="#pricing" class="page-scroll"><span>Pricing</span></a></li>
                    <li><a href="#team" class="page-scroll"><span>Team</span></a></li>
                    <li><a href="#clients" class="page-scroll"><span>Clients</span></a></li>
                    <li><label class="btn btn-primary-filled-nav btn-rounded"><a href="#newsletter" class="page-scroll">Subscribe</a></label></li>
			-->
                </ul>
            </div><!--/.nav-collapse -->
        </nav><!-- / navbar-1 inverse -->

<!-- end division in master layout -->
 
        
@yield('left_content')
 
                     </div><!-- / contact form 1 -->
                </div><!-- / col-sm-6 -->

<!-- end left side, start right side -->                

                <div class="col-sm-6 header-content-details">
                  <div id="right_header_panel"> <!-- this div controls white background and text size -->
        			<div class="textwrap">
        				<button class="btn btn-primary-filled-nav btn-rounded white_background_btn" style="color : white">&nbsp;&nbsp;White background&nbsp;&nbsp;</button>
					</div>
 @yield('right_content') 
       
                  </div><!-- end div right_header_panel -->
                </div><!-- / col-sm-6 -->
            </div><!-- / row -->
        </div><!-- / header-content -->
    </div><!-- / container -->
</header>
<!-- / header -->

<!-- content -->

@yield('below_header_content') 



<!-- footer -->
<!-- dark footer with widgets -->
<footer class="dark-footer">
    <div class="container">
        <p class="footer-info">© 2016 - <strong>FindMyBookPublisher.com</strong> <span class="pull-right">{{ Html::link('contact', 'Contact us') }}</span></p>
    </div><!-- / container -->
</footer><!-- / dark-footer -->

<!-- scroll to top -->
<a href="#top" class="scroll-to-top rounded page-scroll is-hidden" data-nav-status="toggle"><i class="fa fa-angle-up"></i></a>
<!-- / scroll to top -->

<!-- javascript -->
<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.easing.min.js')}}"></script>

<!-- scrolling nav -->
<script src="{{URL::asset('assets/js/scrolling-nav.js')}}"></script>
<!-- / scrolling nav -->

<!-- contact form -->
<script src="{{URL::asset('assets/js/validator.min.js')}}" type="text/javascript"></script>
<!-- 
<script src="{{URL::asset('assets/js/form-scripts.js')}}" type="text/javascript"></script>
-->
<!-- / contact form -->

<!-- sliders -->
<!-- 
<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
-->
<!-- enable changing right panel to white, enable text size modification -->
<script>

    $(document).ready(function() {
        
        var bool_white_bg = false;
        var int_extras_show_delay = 1500;

        $(".fmbp_logo").show(int_extras_show_delay);
        $(".white_background_btn").fadeIn(int_extras_show_delay);
        
    	$(".white_background_btn").click( function() {
        	if (!bool_white_bg)
        	{
				bool_white_bg = true;
//            	$('#right_header_panel').css("background-color", "white");
				$('.header-content-details').css("background-color", "white");
				$(".white_background_btn").text("  Photo background  ");
				$(".white_background_btn").blur();
        	}
        	else
        	{
				bool_white_bg = false;
//        		$('#right_header_panel').css("background-color", "transparent");
				$('.header-content-details').css("background-color", "transparent");
        		$(".white_background_btn").text("  White background  ");
				$(".white_background_btn").blur();
		    }
        	
    	});

    });

</script>
<!-- / clients carousel -->
<!-- / sliders -->

<!-- hide nav -->
<script src="{{URL::asset('assets/js/hide-nav.js')}}"></script>
<!-- / hide nav -->

<!-- bing.com -->
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5680414"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5680414&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>
<!-- end bing.com -->

@yield('page_specific_jquery')

<!-- / javascript -->
</body>

</html>      
