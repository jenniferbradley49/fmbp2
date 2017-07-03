<!-- Stored in resources/views/dashboard.blade.php -->

@extends('layouts.master_admin')

@section('title', 'Dashboard page - admin')

@section('sidebar')
    

  
@endsection

@section('content')
     
<div class="row">
<div class="col-sm-3"> <br><br><br></div>
<div class="col-sm-6"> 
   Administrator dashboard page        
    </div>

    
<div class="col-sm-3"> </div>
</div><!-- end row -->  
     
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/add_user">Add user</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/edit_user'>Edit user - admin</a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->

      
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/choose_user_add_client">Add client</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/choose_client'>Edit client / test client / view client / edit client lead vars</a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->

       
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/view_all_registrations">View all registrations / one registration</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/'></a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->

 <!--      
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/add_lead_info">Add lead info - associated with a project</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/edit_lead_info'>Edit lead info</a>
</div>
    
<div class="col-sm-1"> </div>
</div>--><!-- end row -->

   <!--      

<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/edit_lead_vars">Edit lead vars for client - this is the client specific implementation of lead info, above</a>         
    </div>
<div class="col-sm-5"> 
&nbsp:
</div>
    
<div class="col-sm-1"> </div>
</div>--><!-- end row -->

      
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

        
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/add_survey_project">Add survey project</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/choose_survey_project'>manipulate project / question / item / lead info</a>
</div>
<div class="col-sm-1"> </div>
</div><!-- end row -->

        
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/test_post">Test post request manually</a>         
    </div>
<div class="col-sm-5">   <a href="/admin/see_posts">See tested posts (for test post app)</a>         
         

</div>
<div class="col-sm-1"> </div>
</div>--><!-- end row -->
<!--  
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/admin/choose_survey_question_asi">Add survey item</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/admin/choose_survey_question_esi'>Edit survey item</a>
</div>
<div class="col-sm-1"> </div>
</div>--><!-- end row -->
          
<!--           
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/three_step_admin/view_log">View three step logs</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/three_step_admin/configure'>Configure three step security</a>
</div>
<div class="col-sm-1"> </div>
</div>--> <!-- end row -->
 
  <!--       
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/three_step_admin/change_password">Change three step security password</a>         
    </div>
<div class="col-sm-5"> 
   <a href='/three_step_admin/change_password_hint'>Change three step secuity password hint</a>
</div>
<div class="col-sm-1"> </div>
</div><!-- end row -->
 
 <!--         
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/three_step_admin/edit_email">Edit three step security email</a>         
    </div>
<div class="col-sm-5"> 
</div>
<div class="col-sm-1"> </div>
</div>--><!-- end row -->
 
 
     
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
   <a href="/auth/logout">Log out</a>         
    </div>
<div class="col-sm-5"> 
  <a href="/">Site start page</a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->


@endsection