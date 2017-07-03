@extends('layouts.master_admin')

@section('title', 'Add user - admin')
@section('page_specific_jquery')
@endsection

@section('content')

<div class="row">
	<div class="col-sm-2"><br><br><br><br><br><br> </div>
	<div class="col-sm-8"> 
		The client was successfully tested with the following info:
		<table width='70%' align='center'>
		<tr>
			<td>client ID</td>
			<td>{{ $data['int_client_id'] }}</td>
		</tr>
  		<tr>
			<td>company</td>
			<td>{{ $data['str_company'] }}</td>
		</tr>
		<tr>
			<td>original lead destination</td>
			<td>{{ $data['str_lead_destination'] }}</td>
		</tr>
  		<tr>
			<td>last lead destination tested</td>
			<td>{{ $data['str_lead_destination_tested'] }}</td>
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




