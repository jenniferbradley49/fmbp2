@extends('layouts.master_client')

@section('title', 'Edit user results')
@section('page_specific_jquery')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-2"><br><br><br><br><br><br> </div>
	<div class="col-sm-8"> 
		The user was successfully updated with the following info:
		<table width='70%' align='center'>
		@foreach ($data['arr_request'] as $key => $val)
		<tr>
			<td>{!!$key!!}</td>
			<td>{!!$val!!}</td>
		</tr>
		@endforeach
		
		<tr>
			<td>client ID</td>
			<td>{!!$data['arr_logged_in_user']['cloaked_client_id']!!}</td>
		</tr>
		</table>
		
    </div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
    
 
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
    </div>
<div class="col-sm-5"> 
   <a href='/client/dashboard'>Return to client dashboard</a>
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
     
@endsection	