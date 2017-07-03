<html>
    <head>
        <title>{{ $data['page_heading_content'] }}</title>
 <!-- Latest compiled and minified CSS -->
<!--
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
-->
         <link rel="stylesheet" href="/css/bootstrap.css" media="screen">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>        
<script src='https://www.google.com/recaptcha/api.js'></script>
@yield('page_specific_jquery')
         </head>
    <body>
 
@include('partials.page_heading')


<div class="container-fluid">
 
	<div class="row">
		<div class="col-sm-5"> 
        &nbsp; Logged in as 
         {{ $data['arr_logged_in_user']['email'] }} &nbsp
         {{ $data['arr_logged_in_user']['last_name'] }},
         {{ $data['arr_logged_in_user']['first_name'] }}
         
 		</div>
 	 	
         <div class="col-sm-1">
			<a href="/auth/logout">Log out</a>
		</div>         
         <div class="col-sm-1">
			<div class="text-right"> 
   				<a href='/'>site start</a>
			</div>
		</div>
	</div><!-- end row -->

	<div class="row">
 		<div class="col-sm-12">
 			Your client ID is {{ $data['arr_logged_in_user']['cloaked_client_id'] }}
		</div>         
	</div><!-- end row -->
   
        @yield('content')
</div>
    </body>
</html>