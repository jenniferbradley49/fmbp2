@extends('layouts.master_admin')

@section('title', 'Add user - admin')
@section('page_specific_jquery')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-2"><br><br><br><br><br><br> </div>
	<div class="col-sm-8"> 
		The client was successfully inserted with the following info:
		<table width='70%' align='center'>
		@foreach ($data['arr_request'] as $key => $val)
		<tr>
			<td>{!!$key!!}</td>
			<td>{!!$val!!}</td>
		</tr>
		@endforeach
  		<tr>
			<td>cloaked client ID</td>
			<td>{{ $data['str_cloaked_client_id'] }}</td>
		</tr>
	
		</table>    
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
    
 
<div class="row">
<div class="col-sm-1"> <br><br><br></div>
<div class="col-sm-5"> 
	{!! Html::link('/admin/add_role', 'Add role') !!}
    </div>
<div class="col-sm-5"> 
	{!! Html::link('/admin/dashboard', 'Admin dashboard') !!}
</div>
    
<div class="col-sm-1"> </div>
</div><!-- end row -->
     
@endsection




