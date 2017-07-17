@extends('layouts.master_admin')

@section('title', 'View client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/view_all_contacts.blade.php -->
 
 
         <div class="row">  
        	<div class="col-lg-2">
            </div>
       		<div class="col-lg-8">
              	<br> Contacts from the contact page are listed with most recent first.  Click on the ID
 of email to see all info   <br><br><br> 
            </div>
            <div class="col-lg-2">&nbsp;
            </div>
  		</div> <!-- end row -->
 
   
 
         <div class="row">  
        	<div class="col-lg-1">
        	Contact ID<br><br>
            </div>
       		<div class="col-lg-2">
              	contact email 
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
            
            </div>
  		</div> <!-- end row -->
 
     @foreach($data['arr_all_contacts'] as $arr_contact)    
         <div class="row">  
        	<div class="col-lg-1">
        	{{ Html::link($arr_contact['link'], $arr_contact['id']) }}
            </div>
       		<div class="col-lg-2">
              	{{ Html::link($arr_contact['link'], $arr_contact['str_email']) }} 
            </div>
            <div class="col-lg-2">
                {{ $arr_contact['str_first_name'] }}                    
				<br>
            </div>
            <div class="col-lg-2">
                {{ $arr_contact['str_last_name'] }}                    
				<br>
            </div>
             <div class="col-lg-2">
                {{ $arr_contact['str_telephone'] }}                    
				<br>
            </div>
             <div class="col-lg-2">
                {{ $arr_contact['created_at'] }}                    
				<br>
            </div>
            <div class="col-lg-1">
            
            </div>
  		</div> <!-- end row -->
     	
    @endforeach              
        

@endsection	