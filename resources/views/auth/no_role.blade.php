@extends('layouts.master_client')

@section('title', 'No authorization')
@section('page_specific_jquery')
@endsection

@section('content')
<!-- resources/views/auth/login.blade.php -->

   
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-3"> 
<br><br><br><br>
</div>
<div class="col-sm-7"> 
</div>
 <div class="col-sm-1"> </div>
</div><!-- end row -->
   
 
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-10"> 
Your current log in does not have the appropriate authorization 
to view the intended page.  One possible solution would be to 
<a href="/auth/logout">log out</a>, then log in as a user with 
the appropriate role.
</div>
 
<div class="col-sm-1"> </div>
</div><!-- end row -->
    
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-10"> 
  <div class="text-center"> 
   <a href='/'>Return to site start</a>
</div> 
</div>

<div class="col-sm-1"> </div>
</div><!-- end row -->
   
@endsection	