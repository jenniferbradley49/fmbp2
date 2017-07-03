@extends('layouts.master_admin')

@section('title', 'View client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/view_all_registrations.blade.php -->
 
 
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
        	Reg ID<br><br>
            </div>
       		<div class="col-lg-2">
              	Reg email 
            </div>
            <div class="col-lg-2">
                first name                    
				<br>
            </div>
            <div class="col-lg-2">
                last name                    
				<br>
            </div>
             <div class="col-lg-2">
                telephone                    
				<br>
            </div>
             <div class="col-lg-2">
                created at                    
				<br>
            </div>
            <div class="col-lg-1">
            public ID
            </div>
  		</div> <!-- end row -->
 
     @foreach($data['arr_all_regs_registration_data'] as $arr_registration_data)    
         <div class="row">  
        	<div class="col-lg-1">
        	{{ Html::link($arr_registration_data['link'], $arr_registration_data['registration_id']) }}
            </div>
       		<div class="col-lg-2">
              	{{ Html::link($arr_registration_data['link'], $arr_registration_data['str_email']) }} 
            </div>
            <div class="col-lg-2">
                {{ $arr_registration_data['str_first_name'] }}                    
				<br>
            </div>
            <div class="col-lg-2">
                {{ $arr_registration_data['str_last_name'] }}                    
				<br>
            </div>
             <div class="col-lg-2">
                {{ $arr_registration_data['str_telephone'] }}                    
				<br>
            </div>
             <div class="col-lg-2">
                {{ $arr_registration_data['created_at'] }}                    
				<br>
            </div>
            <div class="col-lg-1">
            {{ $arr_registration_data['int_public_id'] }}
            </div>
  		</div> <!-- end row -->
     	
    @endforeach              
        

@endsection	