<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Marketing / Landing Page Template">
<meta name="keywords" content="responsive, marketing bootstrap template, landing page template, html5, css3, retina ready" />
<meta name="author" content="KingStudio.ro">

<!-- favicon -->
<!--  
<link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
-->
<link rel="icon" href="assets/images/favicon.png">

<!-- page title -->
<title>@yield('title')</title>
<!-- bootstrap css -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- css -->
<!-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
 -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
 -->
<link href="assets/css/animate.css" rel="stylesheet">

<!--<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
-->
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<!--  
<link href="{{ asset('assets/css/owl.theme.css') }}" rel="stylesheet">
-->
<link href="assets/css/owl.theme.css" rel="stylesheet">
<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700" rel="stylesheet">
<!-- 
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
-->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--  
<link href="{{ asset('assets/fonts/FontAwesome.otf') }}" rel='stylesheet' type='text/css'>
-->
<link href="assets/fonts/FontAwesome.otf" rel='stylesheet' type='text/css'>
<!--  
<link rel="stylesheet" href="{{ asset('assets/css/linear-icons.css') }}">
-->
<link rel="stylesheet" href="assets/css/linear-icons.css">

<!-- google recaptcha library -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
                <a class="navbar-brand" href="#"><img src="assets/images/light-logo.png" alt="logo"></a>
            </div><!-- / navbar-header -->
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#features" class="page-scroll"><span>Features</span></a></li>
                    <li><a href="#how" class="page-scroll"><span>How it Works</span></a></li>
                    <li><a href="#pricing" class="page-scroll"><span>Pricing</span></a></li>
                    <li><a href="#team" class="page-scroll"><span>Team</span></a></li>
                    <li><a href="#clients" class="page-scroll"><span>Clients</span></a></li>
                    <li><label class="btn btn-primary-filled-nav btn-rounded"><a href="#newsletter" class="page-scroll">Subscribe</a></label></li>
                </ul>
            </div><!--/.nav-collapse -->
        </nav><!-- / navbar-1 inverse -->
 <!-- end division in master layout -->
 
        
        @yield('content')

        

<!-- footer -->
<!-- dark footer with widgets -->
<footer class="dark-footer">
    <div class="container">
        <p class="footer-info">© 2016 - <strong>TheOne</strong> - Bootstrap Theme <span class="pull-right">Designed by <a href="#">KingStudio</a></span></p>
    </div><!-- / container -->
</footer><!-- / dark-footer -->

<!-- scroll to top -->
<a href="#top" class="scroll-to-top rounded page-scroll is-hidden" data-nav-status="toggle"><i class="fa fa-angle-up"></i></a>
<!-- / scroll to top -->

<!-- javascript -->
<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled JavaScript for bootstrap -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>        
<!-- <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
-->
<!--
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>

<script src="assets/js/jquery.easing.min.js"></script>
-->
<!-- scrolling nav -->
<!-- 
<script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>

<script src="assets/js/scrolling-nav.js"></script>
-->
<!-- / scrolling nav -->

<!-- contact form -->
<!--  
<script src="{{ asset('assets/js/validator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/form-scripts.js') }}" type="text/javascript"></script>

<script src="assets/js/validator.min.js" type="text/javascript"></script>
<script src="assets/js/form-scripts.js" type="text/javascript"></script>
-->
<!-- / contact form -->

<!-- sliders -->
<!--  
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
-->
@yield('page_specific_jquery')


<!-- clients carousel -->
<script>
/*
    $(document).ready(function() {
      $("#clients-carousel").owlCarousel({
        autoPlay: 5000, //set autoPlay to 5 seconds.
        items : 6,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    */
</script>
<!-- / clients carousel -->
<!-- / sliders -->

<!-- hide nav 
<script src="{{ asset('assets/js/hide-nav.js') }}"></script>
-->
<!-- / hide nav -->

<!-- / javascript -->
</body>

</html>