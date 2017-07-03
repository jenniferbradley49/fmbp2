<!-- Stored in resources/views/dashboard.blade.php -->

@extends('layouts.master_client')


@section('sidebar')
    

  
@endsection

@section('content')
  
     
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/client/edit_lead_vars">Edit your lead variable for your CRM</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/client/edit_user'>Edit your user profile</a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->

 <!--     
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/add_role">Add role manually - admin</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/delete_role'>Delete role manually - admin</a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->



@endsection




