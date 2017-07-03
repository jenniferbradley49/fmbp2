<html>
    <head>
        <title>@yield('title')</title>
 <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- 
         <link rel="stylesheet" href="/css/bootstrap.css" media="screen">
-->
         <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>        
<!-- google recaptcha library -->
<script src='https://www.google.com/recaptcha/api.js'></script>

@yield('page_specific_jquery')
    </head>
    <body>
 
             
        <div class="container-fluid">
        @yield('content')
        </div>
    </body>
</html>