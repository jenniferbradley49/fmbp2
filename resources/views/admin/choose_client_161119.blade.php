@extends('layouts.master_admin')

@section('title', 'Add client')
@section('page_specific_jquery')
@endsection

@section('content')

<!-- resources/views/auth/sign_up.blade.php -->
	
	  <div class="bs-docs-section">
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
<select name="user_id" id="user_id">
@foreach($data['arr_users'] as $key => $user_info)
<option value="{{ $key }}" {{ ($data['input_old']['user_id'] == $key ? ' selected="selected"' : '') }}>{{ $user_info }}</option>
@endforeach
</select>
			
			</div>
			<div class="col-sm-2"> </div>
		</div><!-- end row -->
        
        
                                             
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