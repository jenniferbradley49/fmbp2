@extends('layouts.master_public')

@section('title', 'Contact page - success')
@section('page_specific_jquery')
@endsection

@section('left_content')

<div class="row">
	<div class="col-sm-2"><br><br><br><br><br><br> </div>
	<div class="col-sm-8"> 
		We sent the following information:
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     

<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Email
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['email'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     

<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Name
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['first_name'] }} &nbsp;{{ $data['arr_request']['last_name'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     

<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Telephone
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['telephone'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     
     
<div class="row">
	<div class="col-sm-2"><br><br> </div>
	<div class="col-sm-3"> 
	Message
	</div>
	<div class="col-sm-5"> 
{{ $data['arr_request']['message'] }}
	</div>
	<div class="col-sm-2"> </div>
</div><!-- end row -->
     
@endsection

@section('right_content')
<div class="row">
	<div class="col-sm-3"><br><br>&nbsp; </div>
	<div class="col-sm-6"> 
<br><br>
{{ Html::link("/", 'Return to homepage') }}
	</div>
	<div class="col-sm-3"><br><br>&nbsp;</div>
</div><!-- end row -->

@endsection


