@extends('layouts.master_admin')

@section('title', 'View client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/view_client.blade.php -->
       
     @foreach($data['arr_user_info'] as $key => $val)    
        <div class="row">  
        	<div class="col-lg-1">&nbsp;
            </div>
       		<div class="col-lg-4">
              	{{$key}} 
            </div>
            <div class="col-lg-6">
                {{ $val }}                    
				<br>
            </div>
            <div class="col-lg-1">&nbsp;
            </div>
  		</div> <!-- end row -->
    @endforeach              
        

@endsection	