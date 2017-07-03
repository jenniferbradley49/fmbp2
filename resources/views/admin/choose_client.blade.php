@extends('layouts.master_admin')

@section('title', 'Add client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/admin/choose_client.blade.php -->
	
	  <div class="bs-docs-section">
	  
	  
<div class="row">
<div class="col-sm-3"><br><br><br><br><br><br> </div>
<div class="col-sm-6"> 
{{ $data['page_heading_content'] }}
    </div>
<div class="col-sm-3"> </div>
</div><!-- end row -->

	  
        <div class="row">
        	{{ Form::open(array('class' => "form-horizontal")) }}
        
			<div class="col-sm-2"></div>
			<div class="col-sm-8"> 
				@if (count($errors) > 0)
        			<ul>
            			@foreach ($errors->all() as $error)
                			<li>{{ $error }}</li>
            			@endforeach
       			 	</ul>
   				@endif
    		</div>
			<div class="col-sm-2"> </div>
		</div><!-- end row -->
        
        <div class="row">
        
			<div class="col-sm-2"></div>
			<div class="col-sm-8"> 
<select name="client_id" id="client_id">
@foreach($data['arr_clients'] as $key => $client_info)
<option value="{{ $key }}" {{ ($data['input_old']['id'] == $key ? ' selected="selected"' : '') }}>{{ $client_info }}</option>
@endforeach
</select>
			
			</div>
			<div class="col-sm-2"> </div>
		</div><!-- end row -->
        
 
<!-- begin choose action radio group -->
<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-6">Choose an action to execute</div>
				
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'test client') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'test', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Edit client') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'edit', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'View client') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'view', true) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<div class="row">		
	<div class="col-lg-1">&nbsp;</div>

	<div class="col-lg-5">{{ Form::label('str_choice', 'Edit client lead variables') }}</div>
				
	<div class="col-lg-1">{{ Form::radio('str_choice', 'edit_lead_vars', false) }}</div>
				
	<div class="col-lg-5">&nbsp;</div>
</div><!-- end row, level 2 -->

<!-- end choose action radio group -->
        
                                             
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <br>
                      <button type="reset" class="btn btn-default">Cancel</button>&nbsp;
                      <button type="submit" class="btn btn-primary">choose client</button>
                    </div>
                  </div>
                </fieldset>
              {{ Form::close() }}
            </div>
          </div>                 
        </div>
      </div>
@endsection	