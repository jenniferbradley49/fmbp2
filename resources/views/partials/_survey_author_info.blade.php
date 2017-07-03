
<!-- /app/resources/views/partials/_survey_author_info.blade.php -->
			<div class="row">		
				<div class="col-lg-12" style="text-align:center"><br>{{$data['survey_question']->str_text}}<br><br></div>
			</div><!-- end row, level 2 -->

<!-- start salutation -->
	 		
			<div class="row">		
				<div class="col-lg-1">&nbsp;</div>
				<div class="col-lg-10">
					<div class="form-group">
						{{ Form::label('salutation', 'Salutation', array('class' => 'sr-only')) }}
						{{ Form::select('int_salutation_id', $data['arr_salutations'], null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::text('str_first_name', $data['input_old']['str_first_name'], array('class' => "form-control", 'id' => 'str_first_name', 'placeholder' => 'first name')) }}
					</div>
					<div class="form-group">
						{{ Form::text('str_last_name', $data['input_old']['str_last_name'], array('class' => "form-control", 'id' => 'str_last_name', 'placeholder' => 'last name')) }}
					</div>
					
					<div class="form-group">
						{{ Form::text('str_email', $data['input_old']['str_email'], array('class' => "IsEmail form-control", 'id' => 'email', 'placeholder' => 'email')) }}
					</div>
					
					<div class="form-group row">
						{{ Form::label('str_telephone_ac', 'Telephone', array('class' => 'sr-only')) }}
						<div class="col-lg-5">
							{{ Form::text('str_telephone_ac', $data['input_old']['str_telephone_ac'], array('class' => 'IsInteger form-control', 'maxlength' => '3', 'size' => '13', 'id' => 'str_telephone_ac', 'placeholder' => 'telephone-area code')) }}
						</div>
						<div class="col-lg-3">						
							{{ Form::text('str_telephone_two', $data['input_old']['str_telephone_two'], array('class' => 'IsInteger form-control', 'maxlength' => '3', 'size' => '3', 'id' => 'str_telephone_two', 'placeholder' => 'first 3')) }}
						</div>
						<div class="col-lg-1">
							&nbsp;
						</div>
						<div class="col-lg-3">
							{{ Form::text('str_telephone_three', $data['input_old']['str_telephone_three'], array('class' => 'IsInteger form-control', 'maxlength' => '4', 'size' => '4', 'id' => 'str_telephone_three', 'placeholder' => 'last 4')) }}
						</div>
					</div><!-- end div form-group row -->
					</div><!-- end col -->
				<div class="col-lg-1">&nbsp;
				</div>
			</div><!-- end row, level 2 -->
			
			@include('partials._error_message')
						
			@include('partials._back_next_buttons')
			


