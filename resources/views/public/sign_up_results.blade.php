@extends('layouts.master_public')

@section('title', 'Sign up results')
@section('page_specific_jquery')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-2"><br><br><br><br><br><br> </div>
	<div class="col-sm-8"> 
		We created a new profile for you with the following info:
		<table width='70%' align='center'>
		@foreach ($data['arr_request'] as $key => $val)
		<tr>
			<td>{!!$key!!}</td>
			<td>{!!$val!!}</td>
		</tr>
		@endforeach
		<tr>
			<td>client ID</td>
			<td>{!!$data['cloaked_client_id']!!}</td>
		</tr>
		
		</table>    
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-10"> 
	@if ($data['bool_role_assigned']) 
	This user was assinged the client role
	@else
	No role assignment was made
	@endif
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
     
    
 
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
	{!! Html::link('/client/dashboard', 'View your dashboard') !!}
</div>
<div class="col-sm-5"> 
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
     
@endsection




