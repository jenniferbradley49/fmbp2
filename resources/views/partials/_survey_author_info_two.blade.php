
<!-- /app/resources/views/partials/_survey_author_info.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center">
				<br>{{$data['survey_question']->str_text}}<br><br>
				</div>
			</div><!-- end row, level 2 -->

				 		
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-10">
					<div class="form-group">
						{{ Form::label('str_address_one', 'Address line 1', array('class' => 'sr-only')) }}
						{{ Form::text('str_address_one', 
				$data['input_old']['str_address_one'], 
				array('class' => "form-control", 'id' => 'str_address_one', 'placeholder' => 'Address line 1')) }}
					</div>
					<div class="form-group">
						{{ Form::label('str_address_two', 'Address line 2', array('class' => 'sr-only')) }}
						{{ Form::text('str_address_two', 
							$data['input_old']['str_address_two'], 
							array('class' => "form-control", 'id' => 'str_address_two', 'placeholder' => 'Address line 2')) }}
					</div>
					<div class="form-group">
						{{ Form::label('str_city', 'City', array('class' => 'sr-only')) }}
						{{ Form::text('str_city', 
							$data['input_old']['str_city'], 
							array('class' => "form-control", 'id' => 'str_city', 'placeholder' => 'city')) }}
					</div>
					
					<div class="form-group">
						{{ Form::label('int_state_id', 'State', array('class' => 'sr-only')) }}
						{{ Form::select('int_state_id', $data['arr_states'], 
							$data['input_old']['int_state_id'], array('class' => 'form-control')) }}
					</div>
					
					<div class="form-group">
						{{ Form::label('str_zip', 'Zip code', array('class' => 'sr-only')) }}
						{{ Form::text('str_zip', 
							$data['input_old']['str_zip'], 
							array('class' => 'IsInteger form-control', 'maxlength' => '5', 'size' => '5', 'id' => 'int_zip', 'placeholder' => 'zip code')) }}
					</div>
				</div><!-- end col -->
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
			
			
	<!-- start error div -->				
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-10">
				<div class='error_msg' style="text-align:center; color:red"></div>
				</div>
				<div class="col-lg-1">&nbsp;</div>
			</div><!-- end row, level 2 -->
<!-- end email -->
			
				@include('partials._error_message')
		
			
			<!-- next and back buttons -->
			<div class="row">		
				<div class="col-lg-6" style="text-align:center">
					@if (!$data['survey_question']->bool_first)
						<input type='button' id='show_{{$data["survey_question"]->str_name}}_prev' class="btn btn-md btn-primary-filled btn-form-submit btn-rounded" value='Back'>
					@else
						&nbsp;
					@endif
				</div>
				<div class="col-lg-6" style="text-align:center">
					{{Form::submit('Next', array('class' => 'btn btn-md btn-primary-filled btn-form-submit btn-rounded'))}}
				</div>
			</div><!-- end row, level 2 -->
		
		



