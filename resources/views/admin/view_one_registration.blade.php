@extends('layouts.master_admin')

@section('title', 'View client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/view_one_registration.blade.php -->


         <div class="row">  
        	<div class="col-lg-2">
            </div>
       		<div class="col-lg-8">
              	<br> Registrations are listed with most recent first.  Click on the ID
 of email to see all info   <br><br><br> 
            </div>
            <div class="col-lg-2">&nbsp;
            </div>
  		</div> <!-- end row -->
 
   
 
         <div class="row">  
        	<div class="col-lg-1">
        	&nbsp;<br><br>
            </div>
       		<div class="col-lg-3">
              	Item name 
            </div>
            <div class="col-lg-7">
                Item value                   
				<br>
            </div>
            <div class="col-lg-1">
                &nbsp;;                   
				<br>
            </div>            
   	</div> <!-- end row -->
 
     @foreach($data['arr_registration_data'] as $key => $val)    
         <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-3">
              	{{ $key }} 
            </div>
            <div class="col-lg-7">
                {{ $val }}                    
				<br>
            </div>
            <div class="col-lg-1">
                &nbsp;                    
				<br>
            </div>
  		</div> <!-- end row -->
     	
    @endforeach              
        

@endsection	